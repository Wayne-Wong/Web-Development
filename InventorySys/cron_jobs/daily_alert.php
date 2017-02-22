<?php
	session_start();
	require('../dbconnect.php');

	$sql = "SELECT * FROM `inventory` WHERE `quantity` < `low_quantity` AND `alert` = 1 ";
	$query = mysql_query($sql);
	$rows = mysql_num_rows($query);

	if ($rows > 0) {
		while ($rows = mysql_fetch_array($query)) {
			$sql2 = "SELECT `email` FROM `users` WHERE `username` = '".$rows["addbyuser"]."' ";
			$query2 = mysql_query($sql2);
			$rows2 = mysql_num_rows($query2);

			$email = $rows2["email"];
			$subject = "Alert: Low Item (RestInTrack)";
			$body = "Just a friendly reminder that ".$rows["product_name"]." is low in quantity.\nIt's low amount is set to ".$rows["low_quantity"]." and it's current quantity is ".$rows["quantity"]."\n\nFor more information please visit: http://www.chingkwan.com/";
			$headers = "From: TheBestFourMan@chingkwan.com";

			mail($email, $subject, $body, $headers);
		}
	}
?>
