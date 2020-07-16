<?php
//session_start();
include_once("db_connect.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");

if(isset($_POST["username"]) AND isset($_POST["email"])){
	$user = new User();
	$result = $user->createUserAccount($_POST["username"],$_POST["email"],$_POST["password1"],$_POST["usertype"]);
	echo $result;

	exit();
}
 
if(isset($_POST["log_email"]) AND isset($_POST["log_password"])){
	$user = new User();
	$result = $user->UserLogin($_POST["log_email"],$_POST["log_password"]);
	echo $result;
	exit();
}
//get Category*/
 if(isset($_POST["getCategory"])){
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("categories");
	foreach($rows as $row){
		echo "<option value='".$row["cid"]."'>".$row["category_name"]."</option>";
	}
	exit();
}

//fetch brand
if(isset($_POST["getBrand"])){
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("brands");
	foreach($rows as $row){
		echo "<option value='".$row["bid"]."'>".$row["brand_name"]."</option>";
	}
	exit();
}

//Add Category
if(isset($_POST["category_name"]) AND isset($_POST["parent_cat"])){
	$obj = new DBOperation();
	$result = $obj->addCategory($_POST["parent_cat"],$_POST["category_name"]);
	echo $result;
	exit();
}

//Add Brand
if(isset($_POST["brand_name"])){
	$obj = new DBOperation();
	$result = $obj->addBrand($_POST["brand_name"]);
	echo $result;
	exit();
}

//Add Product
if(isset($_POST["product_name"]) AND isset($_POST["added_date"])){
	$obj = new DBOperation();
	$result = $obj->addProduct($_POST["select_cat"],
							   $_POST["select_brand"],
							   $_POST["product_name"],
							   $_POST["product_price"],
							   $_POST["product_qty"],
							   $_POST["added_date"]
							   );
	echo $result;
	exit();
}

//manage Category
if(isset($_POST["manageCategory"])){
	$m = new Manage();
	$result = $m->manageRecordWithPagination("categories",$_POST["pageno"]);	
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if( count($rows) > 0){
		$n = (($_POST["pageno"]-1)*5)+1;
		foreach($rows as $row) {
			?>
				<tr>
					<td><?php echo $n; ?></td>
					<td><?php echo $row["category"] ?></td>
					<td><?php echo $row["parent"]; ?></td>
					<td>
						<a href="#" class="btn btn-success btn-sm" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Active</a>				
					</td>
					<td>
						<a href="#" did="<?php echo $row['id']; ?>" class="btn btn-danger btn-sm del_cat" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Delete</a>
						<a href="#" id="btn_edit" name="btn_edit"  eid="<?php echo $row['id']; ?>" class="btn btn-info btn-sm edit_cat" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Edit</a> 
					</td>
				</tr> 
				
			<?php 
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//deleteCategory
if(isset($_POST["deleteCategory"])){
	$m = new Manage();
	$result = $m->deleteRecord("categories",$_POST["id"],"cid");
	echo $result;
}

//Single record updateCategory
if(isset($_POST["updateCategory"])){
	$m = new Manage();
	$result = $m->getSingleRecord("categories",$_POST["id"],"cid");
	echo json_encode($result);
	exit();
}

//update Record after getting data
if(isset($_POST["update_category"])){
	$m = new Manage();
	$id = $_POST["cid"];
	$name = $_POST["update_category"];
	$parent = $_POST["parent_cat"];
	$result = $m->update_record("categories",['cid'=>$id],['parent_cat'=>'$parent','category_name'=>$name,'status'=>1]);
	echo $result;
	exit();
}

//-----------Brand------------

if(isset($_POST["manageBrand"])){
	$m = new Manage();
	$result = $m->manageRecordWithPagination("brands",$_POST["pageno"]);	
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if( count($rows) > 0){
		$n = (($_POST["pageno"]-1)*5)+1;
		foreach($rows as $row) {
			?>
				<tr>
					<td><?php echo $n; ?></td>
					<td><?php echo $row["brand_name"] ?></td>
					<td>
						<a href="#" class="btn btn-success btn-sm" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Active</a>				
					</td>
					<td>
						<a href="#" did="<?php echo $row['bid']; ?>" class="btn btn-danger btn-sm del_brand" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Delete</a>
						<a href="#" id="btn_edit" name="btn_edit"  eid="<?php echo $row['bid']; ?>" class="btn btn-info btn-sm edit_brand" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Edit</a> 
					</td>
				</tr> 
				
			<?php 
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}


//deleteCategory
if(isset($_POST["deleteBrand"])){
	$m = new Manage();
	$result = $m->deleteRecord("brands",$_POST["id"],"bid");
	echo $result;
}

//Single record updateCategory
if(isset($_POST["updateBrand"])){
	$m = new Manage();
	$result = $m->getSingleRecord("brands",$_POST["id"],"bid");
	echo json_encode($result);
	exit();
}

//update Record after getting data
if(isset($_POST["update_brand"])){
	$m = new Manage();
	$id = $_POST["bid"];
	$name = $_POST["update_brand"];
	$result = $m->update_record("brands",['bid'=>$id],['brand_name'=>$name,'status'=>1]);
	echo $result;
	exit();
}

//-----------------------------Products----------------------------
//manage Products
if(isset($_POST["manageProduct"])){
	$m = new Manage();
	$result = $m->manageRecordWithPagination("products",$_POST["pageno"]);	
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if( count($rows) > 0){
		$n = (($_POST["pageno"]-1)*5)+1;
		foreach($rows as $row) {
			?>
				<tr>
					<td><?php echo $n; ?></td>
					<td><?php echo $row["product_name"]; ?></td>
					<td><?php echo $row["category_name"]; ?></td>
					<td><?php echo $row["brand_name"]; ?></td>
					<td><?php echo $row["product_price"]; ?></td>
					<td><?php echo $row["product_stock"]; ?></td>
					<td><?php echo $row["added_date"]; ?></td>
					<td>
						<a href="#" class="btn btn-success btn-sm" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Active</a>				
					</td>
					<td>
						<a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Delete</a>
						<a href="#" id="btn_edit" name="btn_edit"  eid="<?php echo $row['pid']; ?>" class="btn btn-info btn-sm edit_product" style="padding:.25rem .5rem;font-size:1.875rem;line-height:1.5;border-radius:.2rem;">Edit</a> 
					</td>
				</tr> 
				
			<?php 
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//deleteproduct
if(isset($_POST["deleteProduct"])){
	$m = new Manage();
	$result = $m->deleteRecord("products",$_POST["id"],"pid");
	echo $result;
}


//Single record updateproduct
if(isset($_POST["updateProduct"])){
	$m = new Manage();
	$result = $m->getSingleRecord("products",$_POST["id"],"pid");
	echo json_encode($result);
	exit();
}

//update Record after getting data
if(isset($_POST["update_product"])){
	$m = new Manage();
	$id = $_POST["pid"];
	$name = $_POST["update_product"];
	$cat = $_POST["select_cat"];
	$brand = $_POST["select_brand"];
	$price = $_POST["product_price"];
	$qty = $_POST["product_qty"];
	$date = $_POST["added_date"];
	$result = $m->update_record("products",["pid"=>$id],["cid"=>$cat,"bid"=>$brand,"product_name"=>$name,"product_price"=>$price,"product_stock"=>$qty,"added_date"=>$date]);
	echo $result;
	exit();
}


//------------------Order Processing-----------------------------
if(isset($_POST["getNewOrderItem"])){
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("products");
	?>
		<tr>
		<td><b class="number">1</b></td>
		<td>
			<select name="pid[]" class="form-control form-control-sm pid" required>
				<option value="">Choose Product</option>
				<?php
					foreach($rows as $row){
						?><option value="<?php echo $row['pid']; ?>"><?php echo $row['product_name']; ?></option><?php
					}
				?>
			</select>
		</td>
		<td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>
		<td><input name="qty[]" type="text" class="form-control form-control-sm qty " required></td>									  	
		<td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></td>
		<td><input id="product_name[]" type="hidden" name="product_name[]" class="form-control form-control-sm  product_name"></td>
	
		
		<td>RS.<span class="amt">0</span></td>
		</tr>
	<?php
	exit();
}

//Get price and qty of one item
if(isset($_POST["getPriceAndQty"])){
	$m = new Manage();
	$result = $m->getSingleRecord("products",$_POST["id"],"pid");
	echo json_encode($result);
	exit();
}

//fetch get_order_data 
if(isset($_POST["order_date"]) AND isset($_POST["cust_name"])){
	$orderdate = $_POST["order_date"];
	$cust_name = $_POST["cust_name"];
	
	//Now getting  array from order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_product_name = $_POST["product_name"];
	
	$sub_total = $_POST["sub_total"];
	$gst = $_POST["gst"];
	$discount =$_POST["discount"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];
	
	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($cust_name,$orderdate,$ar_tqty,$ar_qty,$ar_price,$ar_product_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);	
	exit();
}



?>
