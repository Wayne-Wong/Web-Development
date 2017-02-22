<?php
require('dbconnect.php');
session_start();
$store_name=$_REQUEST['store_name'];

include('fpdf/fpdf.php');
class PDF extends FPDF
{
//Simple table
function Table($header,$data)
{
	//Header
	$this->SetMargins(30, 30);
	$w=array(40,30,55,25,20,20);
	//Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],7,$header[$i],1,0,'C');
	$this->Ln();
	//Data
	foreach ($data as $row) 
	{
		$this->Cell(40,6,$row["product_name"],1,0,'C');
		$this->Cell(30,6,$row["quantity"],1,0,'C');
		$this->Cell(55,6,$row["supplier_name"],1,0,'C');
		$this->Cell(25,6,$row["store_name"],1,0,'C');
		$this->Ln();
	}
}

}

$pdf=new PDF();
//Column titles
$pdf->SetMargins(30, 10);
$header=array('Product Name','Quantity','Supplier','Store Name');
//Data loading

//*** Fetch MySQL Data ***//
$sel_query = "Select * from inventory WHERE addbyuser='".$_SESSION["username"]."' AND store_name='".$store_name."' ORDER BY ID;";
$objQuery = mysql_query($sel_query);
$resultData = array();
for ($i=0;$i<mysql_num_rows($objQuery);$i++) {
	$result = mysql_fetch_array($objQuery);
	array_push($resultData,$result);
}
//************************//

//*** Table Dimensions ***//
$pdf->AddPage();
$pdf->SetMargins(45, 10);
$pdf->Ln(10);
$pdf->Cell(18, 10, '', 0);
$pdf->SetFont('Arial', '', 18);
$pdf->Cell(150, 10, 'Rest In Track Inventory Website', 0);
$pdf->Image('../public_html/img/Logo3.png' , 10 ,8, 40 , 40,'PNG');

$pdf->SetMargins(30, 10);
$pdf->SetFont('Arial', '', 10);
$pdf->Ln(25);
$pdf->Table($header,$resultData);

$pdf->Output();
?>