<?php 
require('dbconnect.php');
session_start();
include("verify.php");
$store_name=$_REQUEST['store_name'];
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
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="storeproduct.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	<link rel="stylesheet" href="styles.css" type="text/css" />
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
						<a href="addstore.php?type=showall" class="dropdown-toggle" data-toggle="dropdown">
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
<br>
</br>
<br>
</br>
<div class="container">

<div class="row">

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><p style="text-align: center; font-size:150%;"><?php echo $store_name; ?></p></h3>
    </div>
    <div class="panel-body">

      <div class="col-lg-12" style="padding-left: 0; padding-right: 0;" >
        <form action="index.php" method="get" >

        </form>
      	<div class="pull-right" ><a href="addproduct.php"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add New Product</button></a></div>
        <div class="pull-left" ><div style="color:#2c3e50" class="btn btn-success"></span> Good</div></a></div>
        <div class="pull-left" ><div style="color:orange" class="btn btn-success"></span> Low</div></a></div>
        <div class="pull-left" ><div style="color:red" class="btn btn-success"></span> Very Low</div></a></div>
      
      </div>

      <div class="clearfix"></div>
		
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered ">
            <tbody><tr>
                <th>S.No</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Low Quantity</th>
                <th>Store Name</th>
                <th>Email Supplier</th>
				<th>Action</th>
              </tr>
                
					<?php
					$count=1;
					$sel_query="Select * from inventory WHERE addbyuser='".$_SESSION["username"]."' AND store_name='".$store_name."' ORDER BY ID;";
					$result = mysql_query($sel_query);
					while($row = mysql_fetch_assoc($result)) { 
						$low = $row["low_quantity"];
						$current = $row["quantity"];
						if ($current < $low) {
						 ?>
							<tr><td style="color:red" align="center"><?php echo $count; ?></td><td style="color:red" align="center"><?php echo $row["product_name"]; ?></td><td style="color:red" align="center"><?php echo $row["quantity"]; ?></td><td style="color:red" align="center"><?php echo $row["low_quantity"]; ?></td><td style="color:red" align="center"><?php echo $row["store_name"]; ?></td>				
                  			<td align="center"><?php if ($row["alert"] == 0) { ?> <span class="glyphicon glyphicon-remove"></span> <?php } else { ?> <span class="glyphicon glyphicon-ok"></span> <?php } ?> </td>
                  			<td>
                  			<a href="emailsupplier.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-envelope"></span> Email</button></a>&nbsp;
                    		<a href="editproduct.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;
                    		<a href="deleteproduct.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></a>&nbsp;
                  			</td>
                			</tr>
                		<?php } else if ( ($current - $low) < 5 ) { ?>
                			<tr><td style="color:orange" align="center"><?php echo $count; ?></td><td style="color:orange" align="center"><?php echo $row["product_name"]; ?></td><td style="color:orange" align="center"><?php echo $row["quantity"]; ?></td><td style="color:orange" align="center"><?php echo $row["low_quantity"]; ?></td><td style="color:orange" align="center"><?php echo $row["store_name"]; ?></td>				
                  			<td align="center"><?php if ($row["alert"] == 0) { ?> <span class="glyphicon glyphicon-remove"></span> <?php } else { ?> <span class="glyphicon glyphicon-ok"></span> <?php } ?> </td>
                  			<td>
                  			<a href="emailsupplier.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-envelope"></span> Email</button></a>&nbsp;
                    		<a href="editproduct.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;
                    		<a href="deleteproduct.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></a>&nbsp;
                  			</td>
                			</tr>
                		<?php } else { ?>
                			<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["product_name"]; ?></td><td align="center"><?php echo $row["quantity"]; ?></td><td align="center"><?php echo $row["low_quantity"]; ?></td><td align="center"><?php echo $row["store_name"]; ?></td>
                			<td align="center"><?php if ($row["alert"] == 0) { ?> <span class="glyphicon glyphicon-remove"></span> <?php } else { ?> <span class="glyphicon glyphicon-ok"></span> <?php } ?> </td>			
                  			<td>
                  			<a href="emailsupplier.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-info"><span class="glyphicon glyphicon-envelope"></span> Email</button></a>&nbsp;
                    		<a href="editproduct.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</button></a>&nbsp;
                    		<a href="deleteproduct.php?id=<?php echo $row["id"]; ?>"><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-remove-circle"></span> Delete</button></a>&nbsp;
                  			</td>
                			</tr>
				
				<?php } $count++; } ?>
  
            </tbody></table>
        </div>

    </div>
  </div>
</div>
<center>
 <a target="_blank" href="export.php?store_name=<?php echo $_REQUEST['store_name']; ?>"><button id="exportButton" class="btn btn-lg btn-danger clearfix"><span class="fa fa-file-pdf-o"></span> Export to PDF</button></a>
 <a target="_blank" href="excel.php?store_name=<?php echo $_REQUEST['store_name']; ?>"><button id="exportButton" class="btn btn-lg btn-default clearfix"><span class="fa fa-file-excel-o"></span> Export to Excel</button></a>
</center>
 </div>

</body>
</html>