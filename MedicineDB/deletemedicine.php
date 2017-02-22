<?php
	require('connect.php');
	session_start();

	$id=$_REQUEST['id'];

	$del = "DELETE FROM `profile` WHERE `id` = '$id' ";
	$query = mysql_query($del);

	header("Location: profile.php"); 
	
?>
