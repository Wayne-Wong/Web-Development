<?php
  $status="";
  session_start();
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
    <?php } ?>

  </div>
</nav>

<!-- Middle Search Bar and Menu -->
<div class="container-full; height:100%">
    <div class="row">
       	<div class="col-lg-12 text-center v-center">
          <h1 style="color:#35404f">Have you taken your pills?</h1>
          <p class="lead" style="color:#35404f">Search for medicine</p>
          
          <form class="col-lg-12" method="post">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
              <input name="search" class="form-control input-lg" title="Enter a medicine name" placeholder=<?php if (isset($_POST['search'])){echo $_POST['search'];}else{echo "'Enter medicine name'";}?> >
              <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit">Search</button></span>
            </div>
          </form>
        </div>
        
      </div> <!-- /row -->
  
  	  <div class="row">
        <div class="col-lg-12 text-center v-center" style="font-size:39pt;">
          <a href="signup.php" style="color:#35404f"><i class="glyphicon glyphicon-edit"></i></a> <a href="signin.php" style="color:#35404f"><i class="glyphicon glyphicon-log-in"></i></a>
        </div>
      </div>

</div> <!-- /container full -->

<?php
  require('connect.php');
  session_start();
    if (isset($_POST['search'])) {
      $search = $_POST['search'];
      $search = stripslashes($search);
      $search = mysql_real_escape_string($search);

      $query = "SELECT * FROM `medicine` WHERE `medicine_name`='$search' OR `generic`='$search' ";
      $result = mysql_query($query) or die(mysql_error());
      $rows = mysql_num_rows($result);
        if($rows==1) {      
          $_SESSION['search'] = $search;
          echo "<script>window.open('search_results.php','_self')</script>"; 
        } else {
            $status = "Medicine cannot be found.";
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