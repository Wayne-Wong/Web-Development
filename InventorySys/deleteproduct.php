<?php 
require('dbconnect.php');
$id=$_REQUEST['id'];
$query = "DELETE FROM inventory WHERE id=$id"; 
$result = mysql_query($query) or die ( mysql_error());
header ("Location: allstores.php?"); 
 ?>
