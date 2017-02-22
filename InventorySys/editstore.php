<?php 
require('dbconnect.php');
session_start();
include("verify.php");
$id=$_REQUEST['id'];
$query = "SELECT * from stores where id='".$id."'"; 
$result = mysql_query($query) or die ( mysql_error());
$row = mysql_fetch_assoc($result);
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
								<li><a href="logout.php?logout">Sign Out</a></li>
							</ul>
					</li>
				</ul>
			</div>
		<!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
</nav>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$store_name =$_REQUEST['store_name'];
$address = $_REQUEST['address'];
$city =$_REQUEST['city'];
$state = $_REQUEST['state'];
$zip =$_REQUEST['zip'];
$phone = $_REQUEST['phone'];
$addedbyuser = $_SESSION["username"];
$update="update stores set store_name='".$store_name."', address='".$address."', city='".$city."', state='".$state."', zip='".$zip."', phone='".$phone."', addedbyuser='".$addedbyuser."' where id='".$id."'";
mysql_query($update) or die(mysql_error());
$old_store_name=$_REQUEST['old_store_name'];
$update="UPDATE inventory SET store_name='".$store_name."' WHERE store_name='".$old_store_name."'";
mysql_query($update) or die(mysql_error());
$status = "Store Updated Successfully.";
}
?>
<br>
</br>
<br>
</br>
<div class="container">
                	<div class="storeinfo">
					<p style="font-size:200%;">Edit Store Information</p>
					</div>
</div>
<center>
<div class="form">
<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
    <table width="90%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="20%" align="right">Store Name</td>
        <td width="80%"><label>
          <input name="store_name" type="text" size="64" required value="<?php echo $row['store_name'];?>" />
        </label></td>
      </tr>
		<tr>
        <td width="20%" align="right">Address</td>
        <td width="80%"><label>
          <input name="address" type="text" size="64" required value="<?php echo $row['address'];?>" />
        </label></td>
      </tr>
	  <tr>
        <td width="20%" align="right">City</td>
        <td width="80%"><label>
          <input name="city" type="text" size="64" required value="<?php echo $row['city'];?>" />
        </label></td>
      </tr>
	  <tr>
        <td width="20%" align="right">State</td>
        <td width="80%"><label>
          <input name="state" type="text" size="64" required value="<?php echo $row['state'];?>" />
        </label></td>
      </tr>
	  <tr>
        <td width="20%" align="right">Zip Code</td>
        <td width="80%"><label>
          <input name="zip" type="text" size="64" required value="<?php echo $row['zip'];?>" />
        </label></td>
      </tr>
	  <tr>
        <td width="20%" align="right">Phone Number</td>
        <td width="80%"><label>
          <input name="phone" type="text" size="64" required value="<?php echo $row['phone'];?>" />
        </label></td>
      </tr>      
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input type="submit" class="btn btn-default btn-md" name="submit" value="Update Store Now" />
        </label></td>
      </tr>
    </table>
    </form>
	<p style="color:#FFFFFF;"><?php echo $status; ?></p>
</div>
</center>
</body>
</html>