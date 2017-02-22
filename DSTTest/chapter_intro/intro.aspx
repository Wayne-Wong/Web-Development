<!DOCTYPE html>
<html>
<head>
	<title>TCEQ - Chapter 0</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  	<link href='https://fonts.googleapis.com/css?family=Vollkorn:400,700' rel='stylesheet' type='text/css'>
  	<link rel="stylesheet" type="text/css" href="../dataStandards.css">
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
        <li class="active"><a href="https://www.tceq.texas.gov/" target="_blank"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> TCEQ Homepage</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="toc.aspx" target="_self"><span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span> Go back </a></li>
        <li id="test_timer" style="display:none;"><a href="intro_test.aspx"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Test </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Useful Resources <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://home.tceq.state.tx.us/internal/admin/ir/eamt/docs/cr-ref-data-standards.docx" target="_blank"> TCEQ Data Standards </a></li>
            <li><a href="http://home.tceq.state.tx.us/internal/training/online/data/core/cr-sop-handling-cdf.docx" target="_blank"> Handling of Core Data Forms SOP </a></li>
            <li><a href="http://cf9intprd1.tceq.texas.gov/crintrpt/" target="_blank"> T-Net Central Registry Query with Compliance History Classification & Rating </a></li>
            <li><a href="http://www15.tceq.texas.gov/crpub/" target="_blank"> Public Central Registry Query </a></li>
            <li><a href="http://home.tceq.state.tx.us/internal/training/online/data/core/data_standards_tools.html" target="_blank"> Tools Page </a></li>
            </ul>  
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <div class="jumbotron" id="jumbo">
    <h1 id="title-font">Chapter 0: Introduction</h1>  

 <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js">
    </script>

    <script type="text/javascript">
      $(document).ready(function(){   
       $("#myVideo").bind('ended', function(){
          location.href="intro_test.aspx";   
       }); 
      });
    </script>

    <iframe class="tscplayer_inline" name="tsc_player" src="into-06.29.16_player.html" scrolling="no" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

</div>
</div>
<!-- Timer for the test button to appear
	<script type="text/javascript">
    	setTimeout(function(){
        	document.getElementById('test_timer').style.display = 'block';
   		},10000);
	</script>
-->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>