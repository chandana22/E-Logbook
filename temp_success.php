<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title> Student </title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">

  <script src="jquery.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="forms.js"></script>

</head>
<body id="home">
  <div class="ui inverted page grid masthead segment" >
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">RV College of Engineering</div>
        <div class="right menu">
          <div class="ui top right pointing mobile dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">Classes</a>
              <a class="item">Cocktail Hours</a>
              <a class="item">Community</a>
            </div>
          </div>
		  <<a class="item" href="homepage.html">Home</a>
            <div class="ui dropdown link item">
            Departments
            <i class="dropdown icon"></i>
            <div class="menu">
			  <a class="item">Electronics and Comm</a>
              <a class="item">Computer Science</a>
              <a class="item">Information Science</a>
			  <a class="item">Biotechnology</a>
			  <a class="item">Mechanical</a>
             </div>
          </div>
		  <a class="item" href="history.html">History</a>
          <a class="item" href="about.html">About</a>
		  
		  <a class="item" >Contact us</a>
        </div>
      </div>
      <img src="images/RV_logo.png" class="ui medium image"  style="margin-bottom:6em; width:200px;font-size:1rem" >
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
          Student Login
        </h1>
        <p>Log in as a Student to view your attendance status and reports </p>
        
      </div>
    </div>
  </div>
  

  <div class="ui page grid overview segment" style="padding-left:0px;padding-right:0px">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
		<div class="ui two column center aligned stackable divided grid" >
        <div class="column">
			<img src="images/student_log.jpg" class="circular medium ui image" >
		</div> 
		<div class="column">
			<div class="ui raised green segment">
				<p> Registration successful. Please wait for the faculty to approve this entry. </p>
			</div>
			</div>
		</div>
      </div>
    </div>
  
  <div class="ui primary inverted blue page grid segment" style="	background-image:url(images/12.jpg);background-repeat: no-repeat;  background-size:cover;">
  
   </div>
 
  
</body>

</html>