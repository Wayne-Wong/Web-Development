<!DOCTYPE html>
<html>
<head>
	<title>TCEQ Login Page</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="dataStandards.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Texas Commision on Environmental Quality</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="https://www.tceq.texas.gov/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="signuppage.html"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Sign Up</a></li>    
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
	<form method="post" class="form-horizontal">
  <div class="form-group">
    <label for="inputEmpID" class="col-sm-2 control-label">EmployeeID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmpID" placeholder="Enter your Employee ID" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword" placeholder="Enter your password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button onclick="login_func()" type="submit" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Login now</button>
    </div>
  </div>
</form>
</div>
	<script type="text/javascript">
		function login_func() {
			var user = document.getElementById("inputEmpID").value;
			var pass = document.getElementById("inputPassword").value;

			if ((user === "tceq-employee001") && (pass === "admin123")) {				
				var hWndB = window.open('toc.html'),
    			hWndA = window.self;
				hWndB.onunload = function() { 
					hWndA.location.reload(); 
				}				
			} else {
				alert("The password you entered is invalid");
			}
		}
	</script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>