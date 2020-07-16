<?php 

class Manage{
	
	private $conn;
	
	function __construct() {
		include_once("db_connect.php");
		$db = new Database();
		$this->conn = $db->connect();
	}
	
	public function manageRecordWithPagination($table,$pno){
		$a = $this->pagination($this->conn,$table,$pno,5);
		if($table == "categories"){
			$sql ="SELECT c.cid, p.category_name as category, c.category_name as parent, p.status, p.cid as id FROM categories p LEFT JOIN categories c ON p.parent_cat=c.cid".$a["limit"];
		}elseif($table == "products"){
			$sql= "SELECT p.pid, p.product_name, c.category_name,b.brand_name,p.product_price,p.product_stock,p.added_date,p.p_status FROM products p, brands b, categories c WHERE p.bid = b.bid AND p.cid = c.cid".$a["limit"];
		}else{
			$sql = "SELECT * FROM ".$table." ".$a["limit"];
		}
		$result = $this->conn->query($sql) or die($this->conn->error);
		$rows = array();
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
		}
		return["rows"=>$rows,"pagination"=>$a["pagination"]];
	}  
	
	private function pagination($conn,$table,$pno,$n){
		$query = $conn->query("SELECT COUNT(*) as row FROM ".$table);
		$row = mysqli_fetch_assoc($query);
		//$totalRecords = 100000;
		$pageno = $pno;
		$numberOfRecordsPerPage =$n;
		
		$last = ceil($row["row"]/$numberOfRecordsPerPage);
		
		//echo "Total Pages " .$last. "<br/>";
		
		$pagination="<ul class='pagination'>";
		
		if($last != 1){
			if($pageno > 1){
				$previous = "";
				$previous = $pageno - 1;
				$pagination .="<li class='page-item'><a class='page-link' pn='".$previous."' style='color:#333;'> Previous </a></li>";	
			}
			for($i=$pageno - 5;$i<$pageno;$i++){
				if($i > 0){
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$i."'>".$i." </a>";
				}
			}		
			$pagination .= "<li class='page-item'><a class='page-link'  pn='".$pageno."' style='color:#333;'> $pageno </a></li>";
			for($i=$pageno+1;$i<=$last;$i++){
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$i."'> ".$i." </a></li>";
				if($i > $pageno + 4){
					break;
				}
			}
			if($last > $pageno){
				$next = $pageno + 1;
				$pagination .= "<li class='page-item'><a class='page-link' pn='".$next."' style='color:#333;'> Next </a></li></ul>";	
			}
		} 
		
		$limit = " LIMIT ".($pageno - 1)*$numberOfRecordsPerPage.",".$numberOfRecordsPerPage;
		
		return ["pagination"=>$pagination,"limit"=>$limit];
	}
	
	public function deleteRecord($table,$id,$pk){
		if($table == "categories"){
			$pre_stmt = $this->conn->prepare("SELECT " .$id. " FROM categories WHERE parent_cat = ? ");
			$pre_stmt->bind_param("i",$id);
			$pre_stmt->execute();
			$result = $pre_stmt->get_result() or die($this->conn->error);
			if($result->num_rows > 0){
				return "DEPENDENT_CATEGORY";				
			}else{
				$pre_stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
				$pre_stmt->bind_param("i",$id);
				$result = $pre_stmt->execute() or die($this->conn->error);
				if($result){
					return "CATEGORY_DELETED";
				}
			}
		}else{
			$pre_stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE ".$pk." = ?");
			$pre_stmt->bind_param("i",$id);
			$result = $pre_stmt->execute() or die($this->conn->error);
			if($result){
				return "DELETED";
			}
		}
	}	
	
	public function getSingleRecord($table,$id,$pk){
		$pre_stmt = $this->conn->prepare("SELECT * FROM ".$table." WHERE ".$pk." = ? LIMIT 1");
		$pre_stmt->bind_param("i",$id);
		$pre_stmt->execute() or die ($this->conn->error);
		$result = $pre_stmt->get_result();
		if($result->num_rows == 1){
			$row = $result->fetch_assoc();
		}
		return $row;
	}
	 
	public function update_record($table,$where,$fields){
		$sql = "";
		$condition = "";
		foreach($where as $key => $value){
			//id = '5' AND m_name = 'something'
			$condition .= $key . "='".$value."' AND";
		}
		$condition = substr($condition, 0,-4);
		foreach($fields as $key => $value){
			//UPDATE table SET n_name = '', qty = '' WHERE id = '';
			$sql .= $key . "='".$value."', ";	
		}
		$sql = substr($sql, 0, -2);
		$sql = " UPDATE ".$table." SET ".$sql." WHERE " .$condition;
		if(mysqli_query($this->conn,$sql)){
			return "UPDATED";
		}
	}
	
	public function storeCustomerOrderInvoice($cust_name,$orderdate,$ar_tqty,$ar_qty,$ar_price,$ar_product_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type){
		$pre_stmt = $this->conn->prepare("INSERT INTO `invoice`(`customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES (?,?,?,?,?,?,?,?,?)");
		$pre_stmt->bind_param("ssdddddds",$cust_name,$orderdate,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);
		$pre_stmt->execute() or die ($this->conn->error);
		$invoice_no = $pre_stmt->insert_id;
		if($invoice_no != null){
			for($i=0;$i< count($ar_price);$i++){
				
				//here we are finding the remaining. 
				$rem_qty = $ar_tqty[$i] - $ar_qty[$i];
				if($rem_qty < 0){
					return "ORDER_FAILED_TO_COMPLETED";
				}else{
					//update product_stock	
					$this->conn->query("UPDATE products SET product_stock = '$rem_qty' WHERE product_name = '".$ar_product_name[$i]."' ");
				}
				
				$insert_product = $this->conn->prepare("INSERT INTO `invoice_details`(`invoice_no`, `product_name`, `price`, `qty`) VALUES (?,?,?,?)");
				$insert_product->bind_param("isdd",$invoice_no,$ar_product_name[$i],$ar_price[$i],$ar_qty[$i]);
				$insert_product->execute() or die($this->conn->error);
			}
			return "ORDER_COMPLETED";
		}
	}	

} 

//$m = new Manage();
//echo $m->update_record("categories",['cid'=>31],['parent_cat'=>0,'category_name'=>"test2",'status'=>1]);
//echo $obj->deleteRecord("categories",19,"cid");
//echo "<pre>";
//print_r($obj->manageRecordWithPagination("categories",1));
//print_r($obj->getSingleRecord("categories",3,"cid"));

?>