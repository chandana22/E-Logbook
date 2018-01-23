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
  <title> Reports </title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">

  <script src="jquery.js"></script>
  <script src="jquery_address.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="homepage.js"></script>

  <link rel="stylesheet" type="text/css" href="feed.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <script src="feed.js"></script>
  <script src="report.js"></script>
</head>
<body >
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
  <div class="ui page center aligned grid overview segment">
    
    <div class="fifteen wide column">
   
		
		<div class="ui tabular fluid inverted filter menu">
			<a class="active red item" data-tab="student">
				Student
			</a>
			<a class=" teal item" data-tab="subject">
				Subject
			</a>
			<a class=" blue item" data-tab="semester">
				Semester
			</a>
			<a class="active red item" data-tab="graphical">
				Graphs
			</a>
			
			
		</div>
		 <div class="ui divided inbox selection list active tab" data-tab="student">
		 
		 
		    <div class="ui  raised red segment">
    
			<br /> 
			
		<div class="column">

		<form class="ui teal secondary form segment" name="input" action="approving.php" method="post">
		<div class="ui buttons">
	<a href="each1.php"><div class="ui vertical teal animated large button" id="b1">
  <div class="hidden content">Individual student</div>
  <div class="visible content">
    <i class="user icon"></i>  <i class="user icon"></i>   <i class="user icon"></i>  <i class="user icon"></i> <i class="user icon"></i>   <i class="user icon"></i>
  </div>
</div></a>
  <div class="or"></div>
<a href="all.php">		<div class="ui vertical teal large animated  button" id="b2">
  <div class="hidden content">All students</div>
  <div class="visible content">
    <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i>
  </div>
</div>
</a>


 </div>
</div>
			
		
		</div>
		</div>
		
		
	


		<div class="ui divided inbox selection list tab" data-tab="held">
			 <?php
			
			$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$usn=$_SESSION['usn_of_stu'];
			$qry= "SELECT * FROM student WHERE USN='$usn'";
			$result=mysqli_query($con,$qry);
			if($result) {
				$row=mysqli_fetch_array($result);
				$sem=$row['sem'];
			}
			else {	
					echo "Semester details not given by the student";
			}
			$qry= "SELECT * FROM subject WHERE sem='$sem'";
			$result=mysqli_query($con,$qry);
			if($result) {
				echo " <table class='ui left aligned inverted three column celled table segment'><thead><tr><th>Subject Code</th><th>Subject</th><th>Semester</th><th>Number of classes</th></tr></thead><tbody>";
				while ($row=mysqli_fetch_array($result))
				{	echo "<tr><td>";
					echo $row['sub_code'];
					echo "</td><td>";
					echo $row['sub_name'];
					echo "</td><td>";
					echo $row['sem'];
					echo "</td><td>";
					echo $row['no_of_classes'];
					echo "</td></tr>";
									
				}
				echo "</tbody></table>";
			}
			else {	
					echo "Subject details not given";
			}
			?>
	 </div>
	 <div class="ui divided inbox selection list tab" data-tab="attended">
			 <?php
			
			$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$usn=$_SESSION['usn_of_stu'];
			
			$qry= "SELECT * FROM logbook_final WHERE USN='$usn'";
			$result=mysqli_query($con,$qry);
			if($result) {
				echo " <table class='ui left aligned inverted three column celled table segment'><thead><tr><th>Sid</th><th>Subject name</th><th>USN</th><th>Log in</th><th>System_no</th></tr></thead><tbody>";
				while ($row=mysqli_fetch_array($result))
				{	echo "<tr><td>";
					echo $row['sid'];
					echo "</td><td>";
					echo $row['sub_name'];
					echo "</td><td>";
					echo $row['USN'];
					echo "</td><td>";
					echo $row['log_in'];
					echo "</td><td>";
					echo $row['system_no'];
					echo "</td></tr>";
									
				}
				echo "</tbody></table>";
			}
			else {	
					echo "Subject details not given";
			}
			?>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	  </div>
   
</div>
</div>
</body>

</html>