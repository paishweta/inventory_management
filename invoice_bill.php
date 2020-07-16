<?php
//----------------Invoice Printing----------------------

include_once("./fpdf/fpdf.php");
	
	$pdf = new FPDF();
	$pdf->AddPage();
	
	$pdf->SetFont("Arial","B",17);
	$pdf->Cell(190,10,"Inventory System Invoice",0,1,"C");
	$pdf->SetFont("Arial","B",13);
	$pdf->Cell(40,10,"Order Date",0,0);
	$pdf->Cell(20,10," : 2020-07-15",0,1);
	//$pdf->Cell(190,10,"Inventory System Invoice",0,1,"C");
	$pdf->SetFont("Arial","B",13);
	$pdf->Cell(40,10,"Customer Name",0,0);
	$pdf->Cell(20,10," : Shweta Pai",0,1);
	
	$pdf->Cell(190,10,"",0,1);
	
	$pdf->SetFont("Arial","B",17);
	$pdf->Cell(70,10,"Product Name",1,0,"C");
	$pdf->Cell(30,10,"Quantity",1,0,"C");
	$pdf->Cell(40,10,"Price",1,0,"C");
	$pdf->Cell(40,10,"Total",1,1,"C");
	
	$pdf->SetFont("Arial","B",17);
	$pdf->Cell(70,10,"One Plus 7",1,0,"C");
	$pdf->Cell(30,10,"7",1,0,"C");
	$pdf->Cell(40,10,"25000",1,0,"C");
	$pdf->Cell(40,10,"175000",1,1,"C");

	$pdf->Cell(190,10,"",0,1);
	
	$pdf->Cell(40,10,"Sub Total",0,0);
	$pdf->Cell(20,10," : 29000",0,1);
	
	$pdf->Cell(40,10,"GST Tax",0,0);
	$pdf->Cell(20,10," : 5220",0,1);
	
	$pdf->Cell(40,10,"Discount",0,0);
	$pdf->Cell(20,10," : 0",0,1);
	
	
	$pdf->Cell(40,10,"Net Total",0,0);
	$pdf->Cell(20,10," : 236000",0,1);

	$pdf->Cell(40,10,"Paid",0,0);
	$pdf->Cell(20,10," : 236000",0,1);

	$pdf->Cell(40,10,"Due Amount",0,0);
	$pdf->Cell(20,10," :0",0,1);
	
	$pdf->Cell(40,10,"Payment Type",0,0);
	$pdf->Cell(20,10," :CASH",0,1);
	
	
	$pdf->Cell(180,10,"Signature",0,0,"R");
	
	
	$pdf->Output();



?>