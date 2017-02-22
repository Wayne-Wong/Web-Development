<?php
	require('dbconnect.php');
	session_start();

	$id=$_REQUEST['id'];
	$store=$_REQUEST['store'];

	$check = "SELECT * FROM `inventory` WHERE `id` = '$id' ";
	$query = mysql_query($check);
	$result = mysql_fetch_assoc($query);

	if ($result["alert"] == 0) {
		$alert = mysql_query("UPDATE `inventory` SET `alert` = 1 WHERE `id` = '$id' ");
	} else {
		$alert = mysql_query("UPDATE `inventory` SET `alert` = 0 WHERE `id` = '$id' ");
	}

	header('Location: ' . $_SERVER['HTTP_REFERER']);
	
?>
