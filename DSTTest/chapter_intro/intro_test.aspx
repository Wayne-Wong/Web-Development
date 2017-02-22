<!DOCTYPE html>
<html>
<head>
	<title>TCEQ - Test Chapter 0</title>
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
        <li><a href="intro.aspx" target="_self"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to Video</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> Useful Resources <span class="caret"></span></a>
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
    <h2 id="header-font">Chapter 0: Introduction to the Agency Data Standards</h2> 
    
<form onsubmit="OpenWindow()" id="page1" action="javascript:OpenWindow()" method="post" name="my_form" class="tceq-test">

  <div class="radio">1. Which of the following reasons are why we should follow the Data Standards?</div>
    <label class="radio"></label>
      <input name="question1" id="q1" type="radio" value='A' > Reduces duplication    
    <label class="radio"></label>
      <input name="question1" id="q1" type="radio" value='B'> Increases accuracy
    <label class="radio"></label>
      <input name="question1" id="q1" type="radio" value='C'> Avoids confusion
    <label class="radio"></label>
      <input name="question1" id="q1" type="radio" value='D'> All of the above 
  
  <div class="radio">2. Which of the following reasons are why we should follow the Data Standards?</div>
    <label class="radio"></label>
      <input name="question2" type="radio" value='A' > Reduces duplication    
    <label class="radio"></label>
      <input name="question2" type="radio" value='B'> Increases accuracy
    <label class="radio"></label>
      <input name="question2" type="radio" value='C'> Avoids confusion
    <label class="radio"></label>
      <input name="question2" type="radio" value='D'> All of the above


  <div class="radio">3. Which of the following reasons are why we should follow the Data Standards?</div>
    <label class="radio"></label>
      <input name="question3" type="radio" value='A' > Reduces duplication    
    <label class="radio"></label>
      <input name="question3" type="radio" value='B'> Increases accuracy
    <label class="radio"></label>
      <input name="question3" type="radio" value='C'> Avoids confusion
    <label class="radio"></label>
      <input name="question3" type="radio" value='D'> All of the above
  
    <div>
      <button id="clicked" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> Submit</button>
    </div>

</form>
</div>
</div>

  <script type="text/javascript">
    function OpenWindow() {

      for (var i=0; i<document.my_form.question1.length; i++) {
        if (document.my_form.question1[i].checked) {
         var ans1 = document.my_form.question1[i].value;
        }
      }

      for (var i=0; i<document.my_form.question2.length; i++) {
        if (document.my_form.question2[i].checked) {
        var ans2 = document.my_form.question2[i].value;
        }
      }

      for (var i=0; i<document.my_form.question3.length; i++) {
        if (document.my_form.question3[i].checked) {
        var ans3 = document.my_form.question3[i].value;
        }
      }

      if ((ans1 === 'D') && (ans2 === 'D') && (ans3 === 'D')) {
        alert("Good job!");
        window.open("../chapter_1/toc.aspx", "_self");
      } else {
        alert("Sorry, please check your answers.");
        window.open("intro_test2.aspx", "_self");
      }    
      
    } 
  </script>
	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>