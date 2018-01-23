<?php
session_start();
if(isset($_SESSION['faculty'])==false) {
$_SESSION['Login.Error']= "Faculty login requiblue";
header('Location: faculty_log.php'); 
}
?>



<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Faculty menu</title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">

  <script src="jquery.js"></script>
  <script src="jquery_address.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="homepage.js"></script>

  <link rel="stylesheet" type="text/css" href="feed.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <script src="feed.js"></script>
</head>
<body id="home">
<div class="ui inverted page grid masthead segment" style="padding-top:30px;background-image:url(images/2.jpg)">
   
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">RV College of Engineering</div>
        <div class="right menu">
           <a class="item" href="admin_menu.php">Home</a>
		  <div class="ui dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">Messages </a>
              <a class="item">Timetable</a>
              <a class="item">Profile</a>
			  <a class="item">Biotechnology</a>
			  <a class="item">Mechanical</a>
			  <a class="item">Civil</a>
            </div>
          </div>
          <a class="item" href="admin_info.html">Information</a>
          <a class="item" href="stats.html">Stats</a>
		  
		  <a class="item" href="logout.php">Logout</a>
        </div>
      </div>
      <img src="images/RV_logo.png" class="ui medium image"  style="margin-bottom:6em;width:250px;font-size:1rem" >
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
          Faculty
        </h1>
        <p>View your attendance and other stats here</p>
        <div class="large basic inverted animated fade ui button">
          <div class="visible content"> Lab session </div>
          <div class="hidden content">
		  <a href="temp_logbook.html">View Now</a>
		  </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ui large inverted vertical sidebar menu">
    <a class="active item">
      Messages <span class="ui label">213</span>
    </a>
    <a class="item">
      Timetable <span class="ui label">113</span>
    </a>
    <div class="item">
      <b>Profile</b>
      <div class="menu">
        <a class="item">
          Change Password <span class="ui label">11</span>
        </a>
        <a class="item">
          Update <span class="ui label">21</span>
        </a>
      </div>
    </div>
    <a class="item">
      <i class="bookmark icon"></i> Favorites
    </a>
    <div class="ui dropdown item">
      <i class="add icon"></i> New
      <div class="menu">
        <a class="item"><i class="rss icon"></i> Feed</a>
        <a class="item"><i class="tag icon"></i> Tag</a>
        <a class="item"><i class="folder icon"></i> Group</a>
      </div>
    </div>
  </div>
  
   <div class="ui page center aligned grid overview segment">
    <div class="ui two wide column"></div>
    <div class="fifteen wide column">
      <div class="ui four column center aligned stackable divided grid">
        <div class="column">
          <div class="ui icon header">
          <i class="circular tasks link blue inverted launch icon button"></i>
            Menu 
          </div>
          <p>Opions for the update and modify details.</p>
      
        </div>
        <div class="column">
          <div class="ui icon header">
            <i class="circular inverted blue info link icon"></i>
            Instructions
          </div>
          <p>Instructions for hosting a session and others.</p>
      
        </div>
        <div class="column">
          <div class="ui icon header">
            <i class="circular table inverted blue link icon"></i>
            Report
          </div>
          <p>Reports on various criterions are found here.</p>
      
        </div>
		 <div class="column">
          <div class="ui icon header">
            <i class="circular lock inverted blue link icon"></i>
            Log out 
          </div>
          <p>Sign out as an admin and lock the setting.</p>
      
        </div>
      </div>
    </div>
  </div>  
  
  <div class="ui primary inverted blue page grid segment" style="	background-image:url(images/51.jpg);background-repeat: no-repeat;  background-size:cover;">
  
      </div>
</body>

</html>