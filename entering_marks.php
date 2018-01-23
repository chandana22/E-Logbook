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
  

  <div class="ui page grid overview segment" style="padding-left:0px;padding-right:0px">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
	    <div class="ui column center aligned stackable divided grid" >
            <div class="column">
				
				<form class="ui teal secondary form segment" name="input" action="entered_marks.php" method="post">
					<?php
						$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
							if (mysqli_connect_errno())
							{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$subj=$_SESSION['subj'];
							$exp=$_POST['experiment'];
							
							
							if((isset($_POST['batch'])))
							{
								$batch=$_POST['batch'];
								$_SESSION['batch']=$batch;
							}
							else
								$batch=$_SESSION['batch'];
								
							$qry= "SELECT * FROM session where sub='$subj' and batch='$batch'";
							$result=mysqli_query($con,$qry);
							if($result) {
								$row=mysqli_fetch_array($result);
								{	$_SESSION['sid']= $row['sid'];
								}
								}
							
							$qry= "SELECT * FROM Subject where sub_name='$subj'";
							$result=mysqli_query($con,$qry);
							if($result) {
								$row=mysqli_fetch_array($result);
								{	$sem= $row['sem'];
								}
								}
							
							$table = 'marks_sem' . $sem;
							$_SESSION['table']=$table;
							
							//$qry= "SELECT * FROM student FULL JOIN ".$table." ON student.usn = ".$table.".usn where student.batch = ".$batch." and sub = '".$subj."'";
							$qry = "select * from $table where sub = '$subj' and batch = '$batch'";
							$result=mysqli_query($con,$qry);
							if($result) {
							if(mysqli_num_rows($result) <= 0) {
								echo "<p> No students have registered for this lab session. Click approve to close this session</p>"; 
							}
							else {	
								$v=0;
								echo " Enter marks for ";
								echo $subj;
								echo " for the experiment ";
								echo $exp;
								echo "<br><br>";
								$_SESSION['exp']=$exp;
								echo " <table class='ui  left aligned inverted table segment'><thead><tr><th>USN</th><th>Marks</th></tr></thead><tbody>";
								while ($row=mysqli_fetch_array($result))
								{	
									echo "<tr><td>";
										echo $row['USN'];
										
										echo "</td><td>";
										echo "<div class='field' ><input type='text' name='";
										$nm = $row['USN'];
										echo $nm;
										echo "'";
										$ind = "ex"."$exp";
										if( $row[$ind] != NULL ) echo " value='".$row[$ind]."'";
										echo "></div>";
										echo "</td></tr>";
								}
								echo "</tbody></table>";
							}
							}
					else echo "NO";
					
						?>
		
	<a> <div class="teal centre aligned ui positive button" >Approve</div></a>
	<br><br>
	<a href="enter_marks.php"> &lt; Return to previous page </a>
	<br>

	<div class="ui basic modal">
    <div class="header">
		Commit Session 
    </div>
    <div class="content">
      <div class="left">
        <i class="warning icon"></i>
      </div>
      <div class="right">
        <p>Are you sure you want to <b>approve these students</b> for this session and <b>end this session</b>?</p>
      </div>
    </div>
    <div class="actions">
      <div class="two fluid ui buttons">
        <div class="ui negative labeled icon button">
          <i class="remove icon"></i>
          No
        </div>
        <div class="ui positive right labeled icon submit button">
          Yes
          <i class="checkmark icon"></i>
        </div>
      </div>
    </div>
  </div>
 

</form>
	
	
</div>
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