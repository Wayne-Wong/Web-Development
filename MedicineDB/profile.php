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
	        	<a class="navbar-brand" href="editprofile.php" style="color: white">Edit Account</a>
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


<div class="container">
<div class="row">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><p style="text-align: center; font-size:150%;">
      	<!-- TEST BMI -->
      	<?php 
      		require('connect.php');
      		$test = "SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ";
      		$qr = mysql_query($test);
      		$bmi = mysql_fetch_assoc($qr);
      		$health = ($bmi['weight'] / ($bmi['height'] * $bmi['height']) * 703);
      		if ($health < 18.5) { ?>
      			BMI: <?php echo round($health,2) ?> - You are underweight, increase calorie intake!
      		<?php } else if ($health >= 18.5 && $health <= 24.9) { ?>
      			BMI: <?php echo round($health,2) ?> - You have a normal weight, that's great!
      		<?php } else if ($health >= 25.0 && $health <= 29.9) { ?>
      			BMI: <?php echo round($health,2) ?> You are a bit chubby, but you're still okay!
      		<?php } else if ($health >= 30.0 && $health <= 34.9) { ?>
      			BMI: <?php echo round($health,2) ?> You are overweight, please try to exercise!
      		<?php } else if ($health >= 35.0 && $health <= 39.9) { ?>
      			BMI: <?php echo round($health,2) ?> You are very overweight, start working out!
      		<?php } else { ?>
      			BMI: <?php echo round($health,2) ?> You are extremely obese, please seek medical attention ASAP!
      		<?php } ?>
      </p></h3>
    </div>
    <div class="panel-body">
      <div class="col-md-6">
        <form method="post">
          <div class="form-group" style="width: 400px">
            <label style="color:#35404f">Medicine Name *</label>
            <input type="text" name="personal_med" class="form-control" placeholder="Enter medicine name">
            <button type="submit" name="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add Personal Drug</button>
            <a href="time_info.php" class="btn btn-info"><span class="glyphicon glyphicon-time"></span> Time Info</a>
        </form>
      </div>
    </div>
      <?php
        require('connect.php');
        if (isset($_POST['personal_med'])) {
          $username = $_SESSION['username'];
          $medicine_name = $_POST['personal_med'];
          $date_added = date("Y-m-d");
          $alert = 0;
          $times = 0;
          $ins_query = mysql_query("INSERT INTO `profile` (`username`, `medicine_name`, `times`, `date`, `alert`) VALUES ('$username', '$medicine_name', '$times', '$date_added', '$alert') ");
        }
      ?>

      <div class="clearfix"></div>
		
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered" style="position:center">
            <tbody>
              <tr>
                <th style="text-align:center">No.</th>
                <th style="text-align:center">Date Added</th>
                <th style="text-align:center">Medicine Name</th>
                <th style="text-align:center">Pills Per Day</th>
                <th style="text-align:center">Automatic Alert</th>
              </tr>
              	<tr>
				  <?php
					require('connect.php');
					session_start();
					$count=1;
					$select = "SELECT * from `profile` WHERE `username` = '".$_SESSION["username"]."' ORDER BY `id` DESC;";
					$result = mysql_query($select);
					while($row = mysql_fetch_assoc($result)) { ?>
                  	  <tr>
	                  	  <td align="center"><?php echo $count; ?></td>
	                  	  <td align="center"><?php echo $row["date"]; ?></td>
	                  	  <td align="center"><?php echo $row["medicine_name"]; ?>
	                  	  	<?php
	                  	  		$med = $row["medicine_name"];
	                  	  		$find = "SELECT `generic` FROM `medicine` WHERE `medicine_name`='$med' ";
	                  	  		$query = mysql_query($find);
	                  	  		$res = mysql_fetch_array($query);
	                  	  		if ($res["generic"] != null) {	?>
	                  	  			(<?php echo $res["generic"]; ?>)
	                  	  		<?php } ?>
	                  	  </td>	
	                  	  <td align="center"><?php echo $row["times"]; ?></td>
	                  	  <td align="center"><?php if ($row["alert"] == 0) { ?> <span class="glyphicon glyphicon-remove"></span> <?php } else { ?> <span class="glyphicon glyphicon-ok"></span> <?php } ?> </td>	
		                  <td>
		                    <a href="upamount.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-chevron-up"></span> Up</button></a>&nbsp;
		                    <a href="downamount.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-chevron-down"></span> Down</button></a>&nbsp;
		                    <a href="deletemedicine.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></a>&nbsp;
		                    <?php if ($row["alert"] == 0) { ?>
		                    	<a href="changealert.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-volume-up"></span> Alert On</button></a>&nbsp;
		                    <?php } else { ?>
		                    	<a href="changealert.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-volume-off"></span> Alert Off</button></a>&nbsp;
		                    <?php } ?>
		                  </td>
                	  </tr>
				<?php $count++; } ?>
            </tbody></table>

            <style>
              tbody {
                display: block;
                height: 300px;
                overflow-y: auto;
                overflow-x: hidden;
              }
            </style>

        </div>
    </div>
  </div>
</div>
</div>

  <center>
    <h1 style="color:white"><?php echo $status; ?></h1>
  </center>
  
	<!-- Template Source: Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand. -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>