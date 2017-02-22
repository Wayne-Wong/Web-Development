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
	    		<a class="navbar-brand" href="signup.php" style="color: white">SignUp</a>
	    	</div>
    <?php } ?>

  </div>
</nav>

</br></br></br></br>
<!-- Sign Up Form -->
<center>
  <form method="post">
    <div class="form-group" style="width: 400px">
        <label for="email" style="color:white">Username</label>
        <input type="username" name="username" class="form-control" placeholder=<?php if (isset($_POST['username'])){echo $_POST['email'];}else{echo "'Username required'";}?> >
    </div>
	</br></br>

    <div class="form-group" style="width: 400px">
        <label for="password" style="color:white">Password</label>
        <input type="password" name="password" class="form-control" placeholder=<?php if (isset($_POST['username'])){}else{echo "'Password required'";}?> >
    </div>
    </br></br>

    <button type="submit" name="submit" class="btn btn-primary">Sign In</button>
  </form>
  
</center>

<?php
  require('connect.php');
  session_start();
    if (isset($_POST['username'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $username = stripslashes($username);
      $username = mysql_real_escape_string($username);
      $password = stripslashes($password);
      $password = mysql_real_escape_string($password);

      $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
  		$result = mysql_query($query) or die(mysql_error());
  		$rows = mysql_num_rows($result);
      if($rows == 1) {
        $act = mysql_fetch_array($result);
		    if ($act["activate"] == 0) {
          $status = "Please confirm your email address";
        } else {
          $_SESSION['username'] = $username;
			    echo "<script>window.open('profile.php','_self')</script>"; 
        }
		  } else {
        $status = "Login failed please try again";
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