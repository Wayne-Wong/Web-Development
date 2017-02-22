<?php
require('dbconnect.php');
?>

<!DOCTYPE html>
<html>
<head>
<body>

<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$email = $_POST['email'];
	
	$query = mysql_query("SELECT * FROM `users` WHERE username='$username'");
	$numrow = mysql_num_rows($query);
	
	if($numrow!=0)
	{
		while($row = mysql_fetch_assoc($query)){
			$db_email = $row['email'];
		}
		if($email ==$db_email){
			$code = rand(10000, 1000000);
			
			$to = $db_email;
			$subject = "Password Reset";
			$body = "
			This is an automated email. Please Do not reply to this email.
			
			Click the link below or paste it in your browser
			http://www.chingkwan.com/forgotpassword.php?code=$code&username=$username
			";
			
			mysql_query("UPDATE users set passreset='$code' WHERE username='$username'");
			
			mail($to, $subject, $body);
			
			echo "Check Your Email";
		}
		else{
			echo "Email is incorrect";
		}
	}
	else{
		echo "That username doesnt exist";
	}
}
?>
<?php
if(!isset($_GET['code']))
{
echo "<form action='forgotpassword.php' method='POST'>
 Enter your username<br><input type ='text' name='username'><p>
 Enter your email<br><input type='text' name='email'><p>
 <input type='submit' value='Submit' name='submit'>
</form>";
}
if(isset($_GET['code'])){
	$get_username = $_GET['username'];
	$get_code = $_GET['code'];
	
	$query = mysql_query("SELECT * FROM users where username='$get_username'");
	
	while($row = mysql_fetch_assoc($query))
	{
	$db_code = $row['passreset'];
	$db_username = $row['username'];
	}
	if($get_username == $db_username && $get_code == $db_code){
		echo " <form action='pass_reset_complete.php?code=$get_code' method='POST'>
		Enter a new password<br><input type='password' name='newpass'><br>
		Re-enter your password<br><input type='password' name='newpass1'><p>
		<inpute type='hidden' name='username' value='$db_username'>
		<input type='submit' value='Update Password!'>
		</form>
		";
	}
}

?>

</body>
</html>