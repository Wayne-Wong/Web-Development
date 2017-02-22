<?php
	require('../connect.php');
	$sql_user = "SELECT * FROM `users` WHERE `activate` = 1";
	$query_user = mysql_query($sql_user);
	$row = mysql_num_rows($query_user);

	if ($row > 0) {
		while ($row = mysql_fetch_array($query_user)) {
			$sql_med = "SELECT * FROM `profile` WHERE `username` = '".$row["username"]."' AND `times` > 5";
			$query_med = mysql_query($sql_med);
			$send = mysql_num_rows($query_med);

			if ($send) {
				$medicine_list = "";
				while ($result = mysql_fetch_array($query_med)) {
					$medicine_list .= "> ".$result["medicine_name"]."\n";
				}

				$email = $row["email"];
				$subject = "Alert: Medication (WayneDows7)";
				$body = "Dear ".$row["username"].",\n\nThis is a reminder to take your medication.\n".$medicine_list."\n\nFor more information please visit: http://www.waynedows7.com/\n";
				$headers = "From: admin@waynedows7.com";

				mail($email, $subject, $body, $headers);
			}
		}
	}
?>