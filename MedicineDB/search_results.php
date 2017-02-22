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
	    	<div class="navbar-header">
	    		<a class="navbar-brand" href="signup.php" style="color: white">Sign Up</a>
	    	</div>
    <?php } ?>

  	<?php
  	require('connect.php');
  	session_start();
    if (isset($_POST['search'])){
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
          //echo "<script>window.open('index.php','_self')</script>";
        }
    }
	?>

  </div>
</nav>

	<?php
		require('connect.php');
		$count=1;
		$query="SELECT * FROM `medicine` WHERE `medicine_name`='".$_SESSION["search"]."' OR `generic`='".$_SESSION["search"]."' ";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result); 
	?>

	<form class="col-lg-12" method="post">
            <div class="input-group" style="width:340px;text-align:center;margin:0 auto;">
              <input name="search" class="form-control input-lg" title="Enter a medicine name" placeholder=<?php if (isset($_POST['search'])){echo $_POST['search'];}else{echo "'Enter medicine name'";}?> >
              <span class="input-group-btn"><button class="btn btn-lg btn-primary" type="submit">Search</button></span>
            </div>
    </form>

	</br>

	<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center">
                        <?php echo $row["medicine_name"]; ?>
                        <?php if ($row["generic"] != null) { ?> (<?php echo $row["generic"]; ?>) <?php } ?>
                    </h4>
                </div>
                <div class="panel-body text-center">
                    <p class="lead" style="color: black">
                        <strong>Description: </strong> 
                    	</br>
                    	<p><?php echo $row["description"]; ?> </p>
                    </p>
                </div>
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>General Use: <p><?php echo $row["use"]; ?> </p></li>
                    <li class="list-group-item"><i class="icon-ok text-danger"></i>Side Effects: <p><?php echo $row["side_effects"]; ?> </p></li>
                </ul>

                <?php
                	session_start();
                	if ($_SESSION['username'] != null) {
                ?>
                <div class="panel-footer">
                    <button class="btn btn-lg btn-block btn-warning" type="button" onclick="addFunction()">Add Now!</button>
                </div>
            	<?php } else { ?>
            	<div class="panel-footer">
                    <a class="btn btn-lg btn-block btn-warning" href="signin.php">Please login to add!</a>
                </div>
            	<?php } ?>

            </div>
        </div>
        	
    		<center>
    			<h1 style="color:white"><?php echo $status; ?></h1>
			</center>
    </div>
	</div>

  
	<!-- Template Source: Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand. -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<script type="text/javascript">
			function addFunction() {
				$.ajax({
    				type: "GET",
    				url: "addmedicine.php",
    			}).done(function( data) {
      				alert( data );
    			});
			}
		</script>
	</body>
</html>