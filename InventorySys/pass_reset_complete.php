<?php
require("dbconnect.php");

$newpass = $_POST['newpass'];
$newpass1 = $_POST['newpass1'];
$username = $_POST['username'];
$code = $_GET['code'];

if($newpass == $newpass1)
{
	$enc_pass = md5($newpass);
	
	mysql_query("UPDATE users SET password='$enc_pass' WHERE username='$username'");
	mysql_query("UPDATE users SET passreset='0' WHERE username='$username'");
	
	echo "Your Password has been updated <p> <a href='http://www.chingkwan.com/index.php'>Click here to login</a>";
}
else
{
	echo "Passwords must match <a href='forgotpassword.php?code=$code&username=$username'>Click here to go back<a/>";
}

?>