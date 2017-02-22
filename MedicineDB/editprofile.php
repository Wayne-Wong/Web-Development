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

<!-- Update Form -->
</br>

<?php
  require('connect.php');

  $username = $_SESSION['username'];
  $check = "SELECT * FROM `users` WHERE `username` = '$username' ";
  $query_check = mysql_query($check);
  $res = mysql_fetch_assoc($query_check);
?>

</br></br>
<center>
  <form method="post">
    <input type="hidden" name="new" value="1" />
    <div class="form-group" style="width: 400px">
        <label for="fname" style="color:#35404f">First Name *</label>
        <input type="text" name="fname" class="form-control" required value="<?php echo $res['fname']; ?> ">
    </div>
    <div class="form-group" style="width: 400px">
        <label for="lname" style="color:#35404f">Last Name *</label>
        <input type="text" name="lname" class="form-control" required value="<?php echo $res['lname']; ?> ">
    </div>
    <div class="form-group" style="width: 400px">
        <label for="email" style="color:#35404f">Email *</label>
        <input type="email" name="email" class="form-control" required value="<?php echo $res['email']; ?> ">
    </div>
    <div class="form-inline" style="width: 100px; display: inline-block">
      <label for="height" style="color:#35404f">Height *</label>
      <input type="number" name="height" class="form-control" required value="<?php echo $res['height']; ?> ">
    </div>
    <div class="form-inline" style="width: 100px; display: inline-block">
      <label for="weight" style="color:#35404f">Weight *</label>
      <input type="number" name="weight" class="form-control" required value="<?php echo $res['weight']; ?> ">
    </div>
    </br></br>
    <label class="checkbox-inline" style="color:#35404f">
      <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </label>
  </form>  
</center>

<?php
  if(isset($_POST['new']) && $_POST['new']==1) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $username = $_SESSION['username'];
    $query = "UPDATE `users` SET `fname`='$fname', `lname`='$lname', `email`='$email', `weight`='$weight', `height`='$height' WHERE `username` = '$username' ";
    $result = mysql_query($query);
    if($result) {
      $status = "Update Successful.";
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