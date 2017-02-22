<?php
	require('dbconnect.php');
	$status = "";
	$status1 = "";

	if(isset($_POST['new']) && $_POST['new']==1){
		$account_name = $_REQUEST['account_name'];
		$account_type = $_REQUEST['account_type'];
		
		if($account_type == "---select---"){
			$status = "Please select an accounting type";
		}else{
			$sel_query="Select * from accounts WHERE name='$account_name' AND type='$account_type'";
			$result = mysql_query($sel_query);
			if(mysql_num_rows($result)==0){
				$ins_query="insert into accounts(`name`,`type`)values('$account_name','$account_type')";
				mysql_query($ins_query) or die(mysql_error());
			}else{
				$status = "Account name already existed with the same type";
			}
		}
	}
	if(isset($_POST['new_1']) && $_POST['new_1']==1){
		$debit = $_REQUEST['debit'];
		$credit = $_REQUEST['credit'];
		$amount = $_REQUEST['amount'];
		$description = $_REQUEST['description'];
		$date = getdate(date("U"));
		
		$sel_query="Select * from accounts WHERE name='".$debit."'";
		$result = mysql_query($sel_query);
		if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_assoc($result);
			if($row['type']=='asset'||$row['type']=='expense'||$row['type']=='expense'){
				$new_amount = $row['amount'] + $amount;
			}else{
				$new_amount = $row['amount'] - $amount;
			}
			$update="UPDATE accounts SET amount='".$new_amount."' WHERE id='".$row['id']."'";
			mysql_query($update) or die(mysql_error());
		}else{
			$status1 = "Make sure correct account is selected";
		}
		
		$sel_query="Select * from accounts WHERE name='".$credit."'";
		$result = mysql_query($sel_query);
		if(mysql_num_rows($result) > 0){
			$row = mysql_fetch_assoc($result);
			if($row['type']=='liability'||$row['type']=='revenue'||$row['type']=='stock'){
				$new_amount = $row['amount'] + $amount;
			}else{
				$new_amount = $row['amount'] - $amount;
			}
			$update="UPDATE accounts SET amount='".$new_amount."' WHERE id='".$row['id']."'";
			mysql_query($update) or die(mysql_error());
		}else{
			$status1 = "Make sure correct account is selected";
		}
		
		if($status == ""){
			$ins_query="insert into journal(`date`,`debit`,`credit`,`description`,`amount`)values('$date[month]/$date[mday]/$date[year]','$debit','$credit','$description','$amount')";
			mysql_query($ins_query) or die(mysql_error());
		}
		
	}
?>


<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<title>Business Helper - Financial Statement Generator</title>

	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
   	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
	
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- Home section
================================================== -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12">
				<h3 class="wow fadeInDown" data-wow-delay="0.2s">FINANCIAL STATEMENT GENERATOR</h3>
				<h1 class="wow fadeInDown">BUSINESS HELPER</h1>
				<a href="#about" class="btn btn-default smoothScroll wow fadeInUp" data-wow-delay="0.6s">LEARN MORE</a>
			</div>

		</div>
	</div>		
</section>


<!-- Navigation section
================================================== -->
<section class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="#" class="navbar-brand">Business Helper</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right main-navigation">
				<li><a href="#home" class="smoothScroll">HOME</a></li>
				<li><a href="#about" class="smoothScroll">ABOUT</a></li>
                <li><a href="#testimonial" class="smoothScroll">ACCOUNT CREATE</a></li>
				<li><a href="#blog" class="smoothScroll">DOUBLE ENTRIES</a></li>
				<li><a href="#journal" class="smoothScroll">JOURNAL ENTRIES</a></li>
			</ul>
		</div>

	</div>
</section>


<!-- about section
================================================== -->
<section id="about" class="paralla-section">
	<div class="container">
		<div class="row">
        
			<div class="col-md-6 col-sm-12">
				<img src="images/blog-img-3.jpg" class="img-responsive" alt="about img 1">
			</div>
            
			<div class="col-md-6 col-sm-12">
			</div>

		</div>
        
        <div class="row">
			
			<div class="col-md-6 col-sm-12">
			</div>
            
			<div class="col-md-6 col-sm-12">
				<div class="about-des">
					<h3>Financial Statements</h3>
					<p>This website is for small businesses who cannot afford a formal accounting system. The users can simply enter their transation information and then obtain their financial statements as the output. The following step-by-step will guide users to make their statements.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Creating Account section
================================================== -->
<div id='ca'></div>
<section id="testimonial" class="parallax-section">
	<div class="container">
		<div class="row">
			<center><h2>Creating Account</h2></center>
			<form name="form" method="post" action="index.php#ca"> 
				<input type="hidden" name="new" value="1" />
				<table width="90%" border="0" cellspacing="0" cellpadding="6">
					<tr>
						<td width="20%" align="right">Account Name :&nbsp;&nbsp;</td>
						<td width="80%"><label>
							<input name="account_name" type="text" size="64" required />
						</label></td>
					</tr>
					<tr>
						<td width="20%" align="right">Account Type :&nbsp;&nbsp;</td>
						<td width="80%"><label>
							<select name="account_type">
								<option name='---select---'>---select---</option>
								<option name='asset'>asset</option>
								<option name='liability'>liability</option>
								<option name='stock'>stock</option>
								<option name='revenue'>revenue</option>
								<option name='expense'>expense</option>
							</select>
						</label></td>
					</tr> 
					<tr>
						<td>&nbsp;</td>
						<td><label>
							<input type="submit" class="btn btn-default btn-md" name="button" value="Create This Account Now " />
						</label></td>
					</tr>
				</table>
			</form>
			<?php echo "<p><font color='red'>".$status."</font></p>"; ?>
		</div>
	</div>
</section>
<br></br>
<br></br>



<!-- double entries section
================================================== -->
<div id="de"></div>
<section id="blog" class="paralla-section">
	<div class="container">
		<div class="row">
			<h2>Double Entries</h2>
			<form name="form" method="post" action="index.php#de"> 
				<input type="hidden" name="new_1" value="1" />
				<table width="90%" border="0" cellspacing="0" cellpadding="6">
					<tr>
						<td width="20%" align="right">Debit Account :&nbsp;&nbsp;</td>
						<td width="80%"><label>
							<select name="debit">
									<option name='---select---'>---select---</option>
								<?php
									$query = "SELECT * FROM `accounts` WHERE `type` = 'asset'";
									$result = mysql_query($query);
									echo "<option name= 'asset' >---asset---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'liability'";
									$result = mysql_query($query);
									echo "<option name= 'liability' >---liability---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'stock'";
									$result = mysql_query($query);
									echo "<option name= 'stock' >---stock---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'revenue'";
									$result = mysql_query($query);
									echo "<option name= 'revenue' >---revenue---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'expense'";
									$result = mysql_query($query);
									echo "<option name= 'expense' >---expense---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
								?>
							</select>
						</label></td>
					</tr>
					<tr>
						<td width="20%" align="right">Credit Account :&nbsp;&nbsp;</td>
						<td width="80%"><label>
							<select name="credit">
									<option name='---select---'>---select---</option>
								<?php
									$query = "SELECT * FROM `accounts` WHERE `type` = 'asset'";
									$result = mysql_query($query);
									echo "<option name= 'asset' >---asset---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'liability'";
									$result = mysql_query($query);
									echo "<option name= 'liability' >---liability---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'stock'";
									$result = mysql_query($query);
									echo "<option name= 'stock' >---stock---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'revenue'";
									$result = mysql_query($query);
									echo "<option name= 'revenue' >---revenue---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
									$query = "SELECT * FROM `accounts` WHERE `type` = 'expense'";
									$result = mysql_query($query);
									echo "<option name= 'expense' >---expense---</option>";
									while ($row = mysql_fetch_array($result)) {
										echo '<option name= "'.$row['name'].'" >' .$row['name'] . '</option>';
									}
								?>
							</select>
						</label></td>
					</tr> 
					<tr>
						<td width="20%" align="right">Amount :&nbsp;&nbsp;</td>
						<td width="80%"><label>
							<input name="amount" type="text" required />
						</label></td>
					</tr>
					<tr>
						<td width="20%" align="right">Description :&nbsp;&nbsp;</td>
						<td width="180%"><label>
							<input name="description" type="text"/>
						</label></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><label>
							<input type="submit" class="btn btn-default btn-md" name="button" value="Entry Now " />
						</label></td>
					</tr>
				</table>
			</form>
			<?php echo "<p><font color='red'>".$status1."</font></p>"; ?>
		</div>
	</div>
</section>
<br></br>
<br></br>
<br></br>


<!-- journal entries section
================================================== -->
<section id="journal">
<center><h2>Journal Entries</h2></center>
<div class="container">
	<table class="table table-striped">
        <tbody>
			<tr>
				<th>E.No</th>
				<th>Date</th>
				<th>Account Name/Description</th>
				<th>Dr.</th>
				<th>Cr.</th>
            </tr>
            <?php
				$count=1;
				$sel_query="Select * from journal ORDER BY id;";
				$result = mysql_query($sel_query);
				while($row = mysql_fetch_assoc($result)) { 
			?>
					<tr>
						<td><?php echo $count ?></td>
						<td><?php echo $row['date']?></td>
						<td><?php echo $row['debit']?></td>
						<td><?php echo $row['amount']?></td>
						<td></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$row['credit']?></td>
						<td></td>
						<td><?php echo $row['amount']?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><?php echo $row['description']?></td>
						<td></td>
						<td></td>
					</tr>
					<tr><td></td><td></td><td></td><td></td><td></td></tr>
			<?php 
					$count++;
				} 
			?>
  
        </tbody>
	</table>
	<center><p>--END--</p></center>
</div>
</section>
<br>
<center><a href="statement.php"><button class="button button1">Generate Financial Statements</button></a></center>
<br><br>
<!-- Javascript 
================================================== -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/counter.js"></script>
<script src="js/custom.js"></script>

</body>
</html>