<?php
	require('connect.php');
	session_start();

	$id=$_REQUEST['id'];

	$check = "SELECT * FROM `profile` WHERE `id` = '$id' ";
	$query_check = mysql_query($check);
	$res = mysql_fetch_assoc($query_check);

	if ($res["alert"] == 0) {
		$update = "UPDATE `profile` SET `alert` = 1 WHERE `id` = '$id' ";
		$query = mysql_query($update);
	} else {
		$update = "UPDATE `profile` SET `alert` = 0 WHERE `id` = '$id' ";
		$query = mysql_query($update);
	}

	header("Location: profile.php"); 
	
?>
