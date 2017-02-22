<?php
require('dbconnect.php');
session_start();

if(isset($_REQUEST["store_name"])){
	$store_name = $_REQUEST['store_name'];
	$count = 1;
	$output = '';
	$query="Select * from inventory WHERE addbyuser='".$_SESSION["username"]."' AND store_name='".$store_name."' ORDER BY ID;";
	$result = mysql_query($query);
	if(mysql_num_rows($result) > 0){
		$output .= '
			<table class="table" bordered="1">
				<tr>
					<th>S.No</th>
					<th>Product Name</th>
					<th>Quantity</th>
					<th>Low Quantity</th>
					<th>Store Name</th>
				</tr>
		
		';
		while($row = mysql_fetch_array($result)){
			$output .= '
				<tr>
					<td>'.$count.'</td>
					<td>'.$row["product_name"].'</td>
					<td>'.$row["quantity"].'</td>
					<td>'.$row["low_quantity"].'</td>
					<td>'.$row["store_name"].'</td>
				</tr>
			';
			$count++;
		}
		$output .= '</table>';
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=download.xls");
		echo $output;
	}
}

















?>