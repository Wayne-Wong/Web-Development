<?php
  $status="";
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
		<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	<body style="background-color: #4aaaa5">

<!-- Top Nav Bar-->

<nav class="navbar navbar-inverse" style="background-color: #110022">
  <div class="container-fluid" style="position:fixed">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php" style="color: white">Home</a>
    </div>
    <div class="navbar-header">
      <a class="navbar-brand" href="signin.php" style="color: white">Login</a>
    </div>
    <div class="navbar-header">
      <a class="navbar-brand" href="signup.php" style="color: white">Sign Up</a>
    </div>
  </div>
</nav>

<?php
  require('connect.php');
  $user = $_REQUEST["username"];
  $id = $_REQUEST["id"];

  $sql = "SELECT * FROM `users` WHERE `username` = '$user' ";
  $query = mysql_query($sql);
  if ($query) {
    $check = mysql_fetch_assoc($query);
    $code = md5($check['id']);
    if ($code == $id) {
      $upd_sql = "UPDATE `users` SET `activate` = 1 WHERE `username` = '$user'";
      $upd_query = mysql_query($upd_sql);
      if ($upd_query) {
        $status = "Your account has been activated";
      }
    } else {
      $status = "An error has occurred";
    }
  } else {
    $status = "An error has occured";
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