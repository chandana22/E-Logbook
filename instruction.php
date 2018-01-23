<?php
session_start();
if(isset($_SESSION['admin'])==false) {
$_SESSION['Login.Error']= "Admin login required";
header('Location: admin_log.php'); 
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
  <title>Admin Instruction</title>

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
<div class="ui inverted page grid masthead segment" style="padding-top:30px;background-image:url(images/4.jpg)">
   
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">RV College of Engineering</div>
        <div class="right menu">
        			  
          <a class="item" href="admin_menu.php">Menu</a>
          <a class="item" href="">Report</a>
		  
		  <a class="item" href="">Log out</a>
        </div>
      </div>
      <img src="images/RV_logo.png" class="ui medium image"  style="margin-bottom:6em;width:250px;font-size:1rem" >
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
          Admin
        </h1>
        <p>Host a lab session for the students to log in for a particular lab </p>
        <div class="large basic inverted animated fade ui button">
          <div class="visible content"> Lab session </div>
          <div class="hidden content">
		  <a href="temp_logbook.html">Host Now</a>
		  </div>
        </div>
      </div>
    </div>
  </div>
  <center><h1><b>Instructions</b></h1></center>
  <div class="ui raised green segment" style="margin-top:5%;margin-bottom:10%;margin-left:10%;margin-right:10%">
  <p> An RD Session Host server is the server that hosts Windows-based programs or the full Windows desktop for 
  Remote Desktop Services clients. Users can connect to an RD Session Host server to run programs, to save files, 
  and to use network resources on that server. Users can access an RD Session Host server from within a corporate 
  network or from the Internet by using Remote Desktop Connection or by using RemoteApp. <br><br>
  When a user accesses a program on an RD Session Host server, the program execution occurs on the server. Each user 
  sees only their individual session. The session is managed transparently by the server operating system and is 
  independent of any other client session.<br><br>
  If you deploy a program on an RD Session Host server instead of on each device, there are many benefits. These include the following:<br><br>
  <ul>
  <li>You can quickly deploy Windows-based programs to computing devices across an enterprise. This is especially useful when you have programs 
  that are frequently updated, infrequently used, or difficult to manage.</li><br>
  <li>Users can access programs that are running on an RD Session Host server from devices such as home computers, kiosks, 
  hardware that might not meet the requirements of the operating system or application, and operating systems other than Windows.</li>
  </ul>
</p> 
  
  </div>
  
   <div class="ui primary inverted green page grid segment" style="	background-image:url(images/43.jpg);background-repeat: no-repeat;  background-size:cover;">
         
    <div class="six wide right floated aligned column">
      <h3 class="ui header">Contact Us</h3>
      <addr>
        <img src="images/map.png">	<span style="padding-left:10px" text-align="left"> RVCE Mysore Road</span><br> 
		<span  style="padding-left:20px" text-align="justify">RV Vidyaniketan Post</span> <br>
        <span style="padding-left:20px" text-align="justify"> Bengaluru - 560059 </span><br>
      </addr>
      <p> <img src="images/phone.png"><span style="padding-left:20px">(080) 67 178021</span></p>
	  <p> <img src="images/mail.png"><span style="padding-left:5px">principal@rvce.edu.in</span></p>
    </div>
  </div>
  
  
</body>

</html>