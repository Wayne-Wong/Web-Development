<?php
$status = "";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Registration</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	<title>Welcome - <?php echo $userRow['firstname'].' '.$userRow['lastname']?></title>
	<link rel="stylesheet" href="style.css" type="text/css" />

</head>
<body>
<?php
	require('dbconnect.php');
    if (isset($_POST['username'])){
        $username = $_POST['username'];
		$email = $_POST['email'];
        $password = $_POST['password'];
		$firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$email = stripslashes($email);
		$email = mysql_real_escape_string($email);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);
		$firstname = stripslashes($firstname);
		$firstname = mysql_real_escape_string($firstname);
		$lastname = stripslashes($lastname);
		$lastname = mysql_real_escape_string($lastname);
        $query = mysql_query("SELECT * FROM users where username='$username'"); 
        if(mysql_num_rows($query)>0)
        {
			$status = "Username already exists.";
		}
		else
		{
			$query = "INSERT into `users` (username, password, email, firstname, lastname) VALUES ('$username', '".md5($password)."', '$email', '$firstname', '$lastname')";
			$result = mysql_query($query);
        	if($result)
        	{
        		$status = "Registration Successfully.";
				unset($_POST['username']);
			}

			$find = mysql_query("SELECT * FROM `users` WHERE `username` = '$username' ");
			$res = mysql_num_rows($find);
			$code = md5($username);
			$in = mysql_query("UPDATE `users` SET `code` = '$code' WHERE `username` = '$username'");

			$subject = "Registration with Rest In Track";
			$body = "Congratulation, you've created an account with Rest In Track.\nYou can now start managing your inventory.\nPlease confirmation your email address: http://www.chingkwan.com/identity_confirm.php?id=".$code."\n\nFor more information please visit http://www.chingkwan.com/\n\nPlease say thanks to the following heroes:\n\tMr. Jacob\n\tMr. Kwan\n\tMr. Satender\n\tMr. Wayne";
			$headers = "From: TheBestFourMan@chingkwan.com";

			mail($email, $subject, $body, $headers);
		}
	}
?>
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
			</button>
            <a class="navbar-brand" >Rest In Track</a>
        </div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
     	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            	<li>
                	<a href="index.php?">Login Page</a>
                </li>
            </ul>
        </div>
		<!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

<center>
	<div id="login-form">
	<div class="form">
		<form method="post">
			<table align="center" width="30%" border="0">
				<tr>
					<td><input type="text" name="firstname" placeholder=<?php if (isset($_POST['username'])){echo $_POST['firstname'];}else{echo "'First Name' required";}?> /></td>
				</tr>
				<tr>
					<td><input type="text" name="lastname" placeholder=<?php if (isset($_POST['username'])){echo $_POST['lastname'];}else{echo "'Last Name' required";}?> /></td>
				</tr>
				<tr>
					<td><input type="text" name="username" placeholder=<?php if (isset($_POST['username'])){echo $_POST['username'];}else{echo "'User Name' required";}?> /></td>
				</tr>
				<tr>
					<td><input type="email" name="email" placeholder=<?php if (isset($_POST['username'])){echo $_POST['email'];}else{echo "'Your Email' required";}?> /></td>
				</tr>
				<tr>
					<td><input type="password" name="password" placeholder=<?php if (isset($_POST['username'])){echo $_POST['password'];}else{echo "'Your Password' required";}?> /></td>
				</tr>
				<tr>
					<td><button type="submit" name="submit">Sign Me Up</button></td>
				</tr>
			</table>
		</form>
		<p style="color:#FFFFFF;"><?php echo $status; ?></p>
	</div>
	</div>
</center>
</body>
</html>