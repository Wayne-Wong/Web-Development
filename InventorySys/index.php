<?php
session_start();
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

    <title>Rest In Track</title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php
	require('dbconnect.php');
	
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);

        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."' and confirm = 1";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			echo "<script>window.open('home.php','_self')</script>"; 
        }
		else
		{
            $status = "Login failed please try again";
		}
	}
?>
<nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
		<div class="navbar-header page-scroll">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
			</button>
            <a class="navbar-brand" href="index.php">Rest In Track</a>
        </div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li class="page-scroll">
                    <a href="register.php">Register</a>              
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	
<!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/Logo3.png" alt="" width="304" height="236">
                    <div class="intro-text"> 
                        <span class="name" style="font-size: 50px">Restaurant Inventory Tracker</span>
                    </div>
                </div>
				<p style="color:#FFFFFF;"><?php echo $status; ?></p>
            </div>
        </div>
    </header>
	
<!-- Footer -->
	<nav class="navbar navbar-default navbar-fixed-bottom"> 
		<div class="form">
			<form method="post" role="form">
			<div class="container"> 
				<div class="col-sm-2"></div>
				<div class="col-sm-3">
					<div class="input-group input-group-sm">
						<span class="input-group-addon glyphicon glyphicon-user"></span>    
						<input type="text" name="username" class="form-control" placeholder="Username">
					</div>
				</div>
			
				<div class="col-sm-3">
					<div class="input-group input-group-sm">
						<span class="input-group-addon glyphicon glyphicon-lock"></span>    
						<input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
					</div>
				</div>
				
				<div class="col-sm-1">
					<button type="submit" name="submit" class="btn btn-default btn-sm">
						<span class="glyphicon glyphicon-user"></span> Sign In 
					</button>
					<a href="forgotpassword.php">Forgot Password</a>
				</div>
				</form>
			</div>
		</div>
		
	</nav>
	
	<!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/cbpAnimatedHeader.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>

</body>

</html>