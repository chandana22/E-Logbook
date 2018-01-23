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
} ?>
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

<div class="ui basic modal" id="each_student">
    <div class="header">
		SEMESTER
    </div>
	
    <div class=" content">
	<div class="left">
        <i class="user icon"></i>
      </div>
	  <div class="right">
        
	 
	
     
		
		

  
    
	

	<?php

					
							
							$sem=$_POST['semester'];
							$qry= "SELECT * FROM logbook_final left join subject on logbook_final.sub_name=subject.sub_name where sem='$sem'";
							$result=mysqli_query($con,$qry);

							if($result) {
							if(mysqli_num_rows($result) <= 0) {
								echo "<p> No session details found. Please contact your admin.</p>"; 
							}
							else {	
							
								echo " <table class='ui left aligned inverted five column celled table segment'><thead><tr><th>Sid</th><th>Subject</th><th>Timestamp</th><th>Batch</th><th>Students attended</th></tr></thead><tbody>";
								while ($row=mysqli_fetch_array($result))
								{	echo "<tr><td>";
									echo $row['sid'];
									
									echo "</td><td>";
									echo $row['sub_name'];
									echo "</td><td>";
									echo $row['log_in'];
									echo "</td><td>";
									echo $row['batch'];
									echo "</td><td>";
									
									
									$sid=$row['sid'];
									$q="SELECT count(*) as total FROM logbook_final left join subject on logbook_final.sub_name=subject.sub_name where sid='$sid'";
							$r=mysqli_query($con,$q);
							$data=mysqli_fetch_assoc($r);
							
							echo $data['total'];
								echo "</td></tr>";
									
								}
								echo "</tbody></table>";
							}
							$q="SELECT count(*) as total FROM logbook_final left join subject on logbook_final.sub_name=subject.sub_name where sem='$sem'";
							$r=mysqli_query($con,$q);
							echo " Total number of classes held for this semester : ";
							$data=mysqli_fetch_assoc($r);
							echo $data['total'];
							
						}	
						
				?>
				<div class="actions">
      <div class="two circular ui buttons">
        <a href="admin_report.php">
        <div class="ui positive right labeled icon button" id="gotoeach">
          Close
          <i class="checkmark icon"></i>
        </div>
		</a>
      </div>

</div> 

    </div>
	</div>
	</div>
	
						