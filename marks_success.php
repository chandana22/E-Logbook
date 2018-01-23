<?php
session_start();
if(isset($_SESSION['admin'])==false) {
$_SESSION['Login.Error']= "Admin login required";
header('Location: admin_log.php'); 
}
$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
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
  <title> Host session </title>

  <link href='font.css' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">

  <script src="jquery.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="forms.js"></script>
 
</head>
<body id="home">
  <div class="ui inverted page grid masthead segment" style="padding-top:30px;background-image:url(images/4.jpg)">
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
      <img src="images/RV_logo.png" class="ui medium image"  style="margin-bottom:6em; width:250px;font-size:1rem" >
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
          Host a Session
        </h1>
        <p>Host a session for a particular lab session for the students to register for that subject.</p>
		<div class="large basic inverted animated fade ui button">
          <div class="visible content"> Lab session </div>
          <div class="hidden content">
		  <a href="host_session.php">Host Now</a>
		  </div>
        </div>
        
      </div>
    </div>
  </div>
  

  <div class="ui page grid overview segment" style="padding-left:0px;padding-right:0px" id='notify'>
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
	    <div class="ui column center aligned stackable divided grid" >
            <div class="column">
				<div class="ui teal ceneter aligned raised segment">
				<?php 
						echo "<p class='ui green leaf image'>";
						echo "Successfully entered </p>";
						echo "<br />";
						
						
  
					?>
				
				

  
</div>

<a href='enter_marks.php'> <div class="teal centre aligned ui button" >Enter other marks</div></a>
</div>
  </div>
		</div>
		
      </div>
    </div>


  
  <div class="ui primary inverted green page grid segment" style="	background-image:url(images/43.jpg);background-repeat: no-repeat;  background-size:cover;">
  
     <div class="ten wide column">
      <div class="ui three column stackable grid">
        <div class="column">
          <div class="ui header">About</div>
          <div class="ui inverted link list">
            <a class="item" href="about.html">RVCE</a>
            <a class="item" >Information Science and engineering</a>
            <a class="item" href="lab.html">Laboratory </a>
          </div>
        </div>
        <div class="column">
          <div class="ui header">Gallery</div>
          <div class="ui inverted link list">
            <a class="item">Campus</a>
            <a class="item">Alumni</a>
			<a class="item">8th Mile</a>
			
          </div>
        </div>
        <div class="column">
          <div class="ui header">Community</div>
          <div class="ui inverted link list">
            <a class="item">Kannada Sangha</a>
            <a class="item">Rotaract</a>
            <a class="item">NCC</a>
          </div>
        </div>
      </div>
    </div>
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