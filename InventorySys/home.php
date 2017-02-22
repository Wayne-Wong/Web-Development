<?php
require('dbconnect.php');
session_start();
include("verify.php"); 
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	
	 <title>Rest In Track</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	
	<link rel="stylesheet" href="style.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
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
				
				<ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a href="addsupplier.php?type=showall" class="dropdown-toggle" data-toggle="dropdown">
							Supplier
							<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><a href="addsupplier.php">Add/Edit Supplier</a></li>
								<li><a href="allsupplier.php">List Suppliers</a></li>
							</ul>
					</li>
					<li class="dropdown">
						<a href="addstore.php?type=showall" class="dropdown-toggle" data-toggle="dropdown">
							Store
							<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><a href="addstore.php">Add/Edit Store</a></li>
								<li><a href="allstores.php">List Stores</a></li>
							</ul>
					</li>
					<li class="dropdown">
						<a href="addstore.php?type=showall" class="dropdown-toggle" data-toggle="dropdown">
							Product
							<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><a href="addproduct.php">Add/Edit Product</a></li>
								<li><a href="listproduct.php">List Products</a></li>
							</ul>
					</li>
					<li class="dropdown">
						<a href="addstore.php?type=showall" class="dropdown-toggle" data-toggle="dropdown">
							<?php echo $_SESSION['username']; ?>
							<b class="caret"></b>
						</a>
							<ul class="dropdown-menu">
								<li><a href="editprofile.php">Profile</a></li>
								<li><a href="alertuser.php">Inbox</a></li>
								<li><a href="logout.php?logout">Sign Out</a></li>
								
							</ul>
					</li>
				</ul>
			</div>
		<!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
</nav>
<br>
</br>
<br>
</br>
 <div>
	<center>
	<?php
		$query = "select * from users WHERE username = '".$_SESSION['username']."';";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		echo "<h1>".$row['firstname']."</h1>";
	?>
	<h2>Welcome to your inventory system</h2>
	<img src="img/welcome.jpg" alt="Mountain View" style="width:700px;height:400px;">
	</center>
</div>

</body>
</html>
