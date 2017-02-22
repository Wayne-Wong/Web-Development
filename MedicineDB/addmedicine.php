<?php 
	session_start();
	require('connect.php');

	$username = $_SESSION['username'];
	$medicine_name = $_SESSION['search'];

	if ($_SESSION['search'] != null) {
		$gen = "SELECT * FROM `medicine` WHERE `generic`='$medicine_name' ";
		$gen_res = mysql_query($gen);
		$num = mysql_num_rows($gen_res);
		if ($num > 0) {
			$g = mysql_fetch_assoc($gen_res);
			$medicine_name = $g["medicine_name"];
		}

		$find = "SELECT * FROM `profile` WHERE `username`='$username' AND `medicine_name`='$medicine_name' ";
		$res = mysql_query($find);
		$row = mysql_num_rows($res);
		if($row > 0) {
			echo "You have already added the item.";
		} else {
			$date_added = date("Y-m-d");
			$alert = 0;
			$times = 0;
			$query = "INSERT INTO `profile` (`username`, `medicine_name`, `times`, `date`, `alert`) VALUES ('$username', '$medicine_name', '$times', '$date_added', '$alert') ";
			$result = mysql_query($query);
			if($result) {
		        echo "Medicine has been added.";
		        unset($_SESSION['search']);
		    }
		} 
	} else {
		echo "Cannot be done.";
	}
?>