<?php 
require('dbconnect.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM suppliers WHERE id=$id"; 
$result = mysql_query($query) or die ( mysql_error());
header("Location: allsupplier.php"); 
 ?>
