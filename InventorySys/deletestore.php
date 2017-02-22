<?php 
require('dbconnect.php');
$id=$_REQUEST['id'];
$query = "Select `store_name` from stores WHERE id = '".$id."'";
$result = mysql_query($query);
$row = mysql_fetch_assoc($result);
$store_name = $row['store_name'];


$query = "DELETE FROM stores WHERE id=$id"; 
$result = mysql_query($query) or die ( mysql_error());


$query = "DELETE FROM inventory WHERE store_name='".$store_name."'"; 
$result = mysql_query($query) or die ( mysql_error());

header("Location: allstores.php"); 
 ?>
