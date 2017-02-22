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

</br></br></br>

<div class="container">
  <div class="table-responsive"> 
    <table class="table table-bordered" style="width: 50%; margin: 0 auto;">
        <thead>
            <tr>
                <th><b>Pills Per Day</b></th>
                <th><b>Time UTC/GMT -6 hours (Central Standard Time)</b></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: center"><b>1</b></td>
                <td><b>8:00am</b></td>
            </tr>
            <tr>
                <td style="text-align: center"><b>2</b></td>
                <td><b>8:00am, 12:00pm</b></td>
            </tr>
            <tr>
                <td style="text-align: center"><b>3</b></td>
                <td><b>8:00am, 12:00pm, 4:00pm</b></td>
            </tr>
            <tr>
                <td style="text-align: center"><b>4</b></td>
                <td><b>8:00am, 12:00pm, 4:00pm, 8:00pm</b></td>
            </tr>
            <tr>
                <td style="text-align: center"><b>5</b></td>
                <td><b>8:00am, 12:00pm, 4:00pm, 8:00pm, 12:00am</b></td>
            </tr>
            <tr>
                <td style="text-align: center"><b>6</b></td>
                <td><b>8:00am, 12:00pm, 4:00pm, 8:00pm, 12:00am, 4:00am</b></td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<style>
  th {
    background-color: #4CAF50;
    color: white;
    font-family: Slabo;
  }

  td {
    background-color: white;
    color: black;
    font-family: Slabo;
  }
</style>

  <!-- Template Source: Template from Bootply</a> &nbsp; ©Copyright 2013 ACME<sup>TM</sup> Brand. -->
  <!-- script references -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>