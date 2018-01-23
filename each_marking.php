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

<div class="ui basic modal" id="each_student">
    <div class="header">
		STUDENT
    </div>
	
    <div class=" content">
	<div class="left">
        <i class="user icon"></i>
      </div>
	  <div class="right">
        
	 
	
     
		
		

  
    
	

	<?php
if(isset($_POST['USN'])){
					
					$usn=$_POST['USN'];
							
							$qry= "SELECT * FROM student WHERE USN='$usn'";
							$result=mysqli_query($con,$qry);

							if($result) {
							if(mysqli_num_rows($result) <= 0) {
								echo "<p> No student details found. Please contact your admin.</p>"; 
							}
							else
							{
								$row=mysqli_fetch_array($result);
								$sem=$row['sem'];
							
								$table= 'marks_sem' . $sem;
					
							
							
							$qry= "SELECT * FROM $table WHERE USN='$usn'";
							$result=mysqli_query($con,$qry);

							if($result) {
							if(mysqli_num_rows($result) <= 0) {
								echo "<p> No student details found. Please contact your admin.</p>"; 
							}
							else {	
							
								echo " <table class='ui left aligned inverted five column celled table segment'><thead><tr><th class='ten wide'>Particular</th><th class='ten wide'>Details</th></tr></thead><tbody>";
								$t=2;
								
							while($row=mysqli_fetch_array($result))
									{
									echo "<tr><td>";
									echo 'USN';
									echo "</td><td>";
									echo $row['USN'];
									echo "</td></tr>";
									
										
									echo "<tr><td>";
									echo 'Subject';
									echo "</td><td>";
									echo $row['sub'];
									echo "</td></tr>";
									$e='1';
									$ex='ex1';
									echo $ex;
									$v=$row[$ex];
									echo $v;
									echo "<tr><td>";
									echo 'Experiment 1';
									 
										
										echo "</td><td>";
										
										echo $row['ex1'];
										
										echo "</td></tr>";
										echo "<tr><td>";
									echo 'Experiment 2';
									 
										
										echo "</td><td>";
										
										echo $row['ex2'];
										
										echo "</td></tr>";
										echo "<tr><td>";
									echo 'Experiment 3';
									 
										
										echo "</td><td>";
										
										echo $row['ex3'];
										
										echo "</td></tr>";
										echo "<tr><td>";
									echo 'Experiment 4';
									 
										
										echo "</td><td>";
										
										echo $row['ex4'];
										
										echo "</td></tr>";
										
									
									
								
									
								}}
								echo "</tbody></table>";
							}
							 
				}		}}
				?>
				<div class="actions">
      <div class="two circular ui buttons">
        <a href="each_mark.php">
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
	
						