<?php
	require('dbconnect.php');
	$id = $_REQUEST['id'];

	$query = mysql_query("UPDATE `users` SET `confirm` = 1 WHERE `code` = '$id' ");
	if ($query) {
		$login = mysql_query("SELECT * FROM `users` WHERE `code` = '$id' ");
		$res = mysql_num_rows($login);
		$_SESSION['username'] = $res['username'];
		echo "<script>window.open('welcome.php','_self')</script>"; 
	}
?>