<?php

	$conn = mysqli_connect("localhost","root","","project_inv");
	
	function pagination($conn,$table,$pno,$n){
		$totalRecords = 100000;
		$pageno = $pno;
		$numberOfRecordsPerPage =$n;
		
		$last =ceil($totalRecords/$numberOfRecordsPerPage);
		
		$pagination="";
		
		if($last != 1){
			if($pageno > 1){
				$previous = "";
				$previous = $pageno - 1;
				$pagination .= "<a href='pagination.php?pageno=".$previous."' style='color:#333;'> Previous </a>";	
			}
			for($i=$pageno - 5;$i<$pageno;$i++){
				if($i > 0){
				$pagination .= "<a href='pagination.php?pageno=".$i."'>".$i." </a>";
				}
			}		
			$pagination .= "<a href='pagination.php?pageno=".$pageno."' style='color:#333;'> $pageno </a>";
			for($i=$pageno+1;$i<=$last;$i++){
				$pagination .= "<a href='pagination.php?pageno=".$i."'> ".$i." </a>";
				if($i > $pageno + 4){
					break;
				}
			}
			if($last > $pageno){
				$next = $pageno + 1;
				$pagination .= "<a href='pagination.php?pageno=".$next."' style='color:#333;'> Next </a>";	
			}
		} 
		// LIMIT 0,10
			//LIMIT 10,10
		$limit = " LIMIT ".($pageno - 1)*$numberOfRecordsPerPage.",".$numberOfRecordsPerPage;
		
		return ["pagination"=>$pagination,"limit"=>$limit];
	}
	if(isset($_GET["pageno"])){
		$pageno = $_GET["pageno"];	
		echo "<pre>";
		echo pagination($conn,"xxx",$pageno,10);	
	}
?>