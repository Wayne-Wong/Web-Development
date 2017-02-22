<?php
	require('connect.php');
	session_start();

	$id=$_REQUEST['id'];

	$check = "SELECT * FROM `profile` WHERE `id` = '$id' ";
	$query_check = mysql_query($check);
	$res = mysql_fetch_assoc($query_check);

	if ($res["times"] == 0) {
		
	} else {
		$update = "UPDATE `profile` SET `times` = `times` - 1 WHERE `id` = '$id' ";
		$query = mysql_query($update);
	}

	header("Location: profile.php"); 
	
?>
