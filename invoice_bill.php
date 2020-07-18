<?php
//----------------Invoice Printing----------------------

include_once("./fpdf/fpdf.php");

	$pdf = new FPDF();
	$pdf->AddPage();
	
	$pdf->SetFont("Arial","B",17);
	$pdf->Cell(190,10,"Inventory System Invoice",0,1,"C");
	$pdf->SetFont("Arial","B",13);
	$pdf->Cell(40,10,"Order Date",0,0);
	$pdf->Cell(20,10," : ".$_GET["order_date"],0,1);
	//$pdf->Cell(190,10,"Inventory System Invoice",0,1,"C");
	$pdf->SetFont("Arial","B",13);
	$pdf->Cell(40,10,"Customer Name",0,0);
	$pdf->Cell(20,10," : " .$_GET["cust_name"],0,1);
	
	$pdf->Cell(190,10,"",0,1);

	$pdf->Cell(10,10,"#",1,0,"C");	
	$pdf->Cell(70,10,"Product Name",1,0,"C");
	$pdf->Cell(30,10,"Quantity",1,0,"C");
	$pdf->Cell(40,10,"Price",1,0,"C");
	$pdf->Cell(40,10,"Total",1,1,"C");

for($i=0;$i < count($_GET["pid"]);$i++){
	$pdf->Cell(10,10,"#",1,0,"C");	
	$pdf->Cell(70,10,$_GET["product_name"][$i],1,0,"C");
	$pdf->Cell(30,10,$_GET["qty"][$i],1,0,"C");
	$pdf->Cell(40,10,$_GET["price"][$i],1,0,"C");
	$pdf->Cell(40,10,$_GET["qty"][$i] * $_GET["price"][$i] ,1,1,"C");
}
	$pdf->Cell(190,10,"",0,1);
	
	$pdf->Cell(40,10,"Sub Total",0,0);
	$pdf->Cell(20,10," : " .$_GET["sub_total"],0,1);
	
	$pdf->Cell(40,10,"GST Tax",0,0);
	$pdf->Cell(20,10," : " .$_GET["gst"],0,1);
	
	$pdf->Cell(40,10,"Discount",0,0);
	$pdf->Cell(20,10," : " .$_GET["discount"],0,1);
	
	
	$pdf->Cell(40,10,"Net Total",0,0);
	$pdf->Cell(20,10," : " .$_GET["net_total"],0,1);

	$pdf->Cell(40,10,"Paid",0,0);
	$pdf->Cell(20,10," : " .$_GET["paid"],0,1);

	$pdf->Cell(40,10,"Due Amount",0,0);
	$pdf->Cell(20,10," : " .$_GET["due"],0,1);
	
	$pdf->Cell(40,10,"Payment Type",0,0);
	$pdf->Cell(20,10," : " .$_GET["payment_type"],0,1);
	
	
	$pdf->Cell(180,10,"Signature",0,0,"R");
	
	
	$pdf->Output();



?>