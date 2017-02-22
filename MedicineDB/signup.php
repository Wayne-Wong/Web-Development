<?php
  session_start();
  $status = "";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Take Your Pills</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/form-register.css" rel="stylesheet">
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body style="background-color: #4aaaa5">

<!-- Top Nav Bar-->
<nav class="navbar navbar-inverse" style="background-color: #110022">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color: white">Home</a>
    </div>

    <?php
        if ($_SESSION['username'] != null) { ?>
          <div class="navbar-header">
            <a class="navbar-brand" href="profile.php" style="color: white">Profile</a>
        </div>
          <div class="navbar-header">
            <a class="navbar-brand" href="signout.php" style="color: white">Logout : <?php echo $_SESSION['username']; ?></a>
          </div>
    <?php } else { ?>
        <div class="navbar-header">
          <a class="navbar-brand" href="signin.php" style="color: white">Login</a>
        </div>
    <?php } ?>

  </div>
</nav>

<!-- Sign Up Form -->
</br>
<center>
  <form method="post">
    <div class="form-group" style="width: 400px">
        <label for="fname" style="color:#35404f">First Name *</label>
        <input type="text" name="fname" class="form-control" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['fname'];}else{echo "'Enter First Name'";}?> >
    </div>
    <div class="form-group" style="width: 400px">
        <label for="lname" style="color:#35404f">Last Name *</label>
        <input type="text" name="lname" class="form-control" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['lname'];}else{echo "'Enter Last Name'";}?> >
    </div>
    <div class="form-group" style="width: 400px">
        <label for="username" style="color:#35404f">Username *</label>
        <input type="text" name="username" class="form-control" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['username'];}else{echo "'Enter Username'";}?> >
    </div>
    <div class="form-group" style="width: 400px">
        <label for="email" style="color:#35404f">Email *</label>
        <input type="email" name="email" class="form-control" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['email'];}else{echo "'Enter Email'";}?> >
    </div>
    <div class="form-group" style="width: 400px">
        <label for="password" style="color:#35404f">Password *</label>
        <input type="password" name="password" class="form-control" placeholder=<?php if (isset($_POST['fname'])){}else{echo "'Enter Password'";}?> >
    </div> 

    <div class="form-inline" style="width: 100px; display: inline-block">
      <label for="height" style="color:#35404f">Height *</label>
      <input type="number" name="height" class="form-control" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['height'];}else{echo "'inches'";}?> >
    </div>
    <div class="form-inline" style="width: 100px; display: inline-block">
      <label for="weight" style="color:#35404f">Weight *</label>
      <input type="number" name="weight" class="form-control" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['weight'];}else{echo "'lbs'";}?> >
    </div>
    </br></br>

    <label class="checkbox-inline" style="color:#35404f">
      <input type="checkbox" name="gender" value="male" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['gender'];} ?>> Male
    </label>
    <label class="checkbox-inline" style="color:#35404f">
      <input type="checkbox" name="gender" value="female" placeholder=<?php if (isset($_POST['fname'])){echo $_POST['gender'];} ?>> Female
    </label>
    <label class="checkbox-inline" style="color:#35404f">
      <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
    </label>
  </form>
  
</center>

<?php
  require('connect.php');
    if (isset($_POST['fname'])){
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $gender = $_POST['gender'];
      $height = $_POST['height'];
      $weight = $_POST['weight'];
      $fname = stripslashes($fname);
      $fname = mysql_real_escape_string($fname);
      $lname = stripslashes($lname);
      $lname = mysql_real_escape_string($lname);
      $username = stripslashes($username);
      $username = mysql_real_escape_string($username);
      $email = stripslashes($email);
      $email = mysql_real_escape_string($email);
      $password = stripslashes($password);
      $password = mysql_real_escape_string($password);
      $height = stripslashes($height);
      $height = mysql_real_escape_string($height);
      $weight = stripslashes($weight);
      $weight = mysql_real_escape_string($weight);

      $query = mysql_query("SELECT * FROM `users` where `username`='$username'"); 
      if(mysql_num_rows($query)>0)
      {
        $status = "Sorry, username already exists.";
      }
      else
      {
        $query = "INSERT into `users` (fname, lname, username, password, email, weight, height, gender) VALUES ('$fname', '$lname', '$username', '".md5($password)."', '$email', '$weight', '$height', '$gender')";
        $result = mysql_query($query);
        $code_query = mysql_query("SELECT * FROM `users` where `username` = '$username'");
        $code = mysql_fetch_assoc($code_query);
        //email client regarding registration
        $act = md5($code["id"]);
        $emailTo = $email;
        $subject = "Registration - Medicine Reminder!";
        $body = "Thanks for signing up, your account has been created.\n\nYour account info: \nFirst name: ".$fname."\nLast name: ".$lname."\nUsername: ".$username."\nEmail: ".$email."\nHeight: ".$height."\nWeight: ".$weight."\nTo confirm your email address, please click here: http://medicine.waynewong93.com/activate.php?username=".$username."&id=".$act."\n\nFor more information please visit: http://medicine.waynewong93.com/\n";
        $headers = "From: admin@waynewong93.com";

        mail($emailTo, $subject, $body, $headers);

        if($result)
        {
          $status = "Registration Successful.";
          unset($_POST['fname']);
        }
      }
    }
?>

<center>
    <h1 style="color:white"><?php echo $status; ?></h1>
</center>

	<!-- Template Source: Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand. -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>