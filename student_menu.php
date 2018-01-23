<?php
session_start();
if(isset($_SESSION['student'])==false) {
$_SESSION['Login.Error']= "Student login required";
header('Location: student_log.php'); 
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
  <title>Student menu</title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">

  <script src="jquery.js"></script>
  <script src="jquery_address.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="homepage.js"></script>

  <link rel="stylesheet" type="text/css" href="feed.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">
  <script src="feed.js"></script>
  <script src="forms.js"></script>
</head>
<body id="home">
<div class="ui inverted page grid masthead segment" style="padding-top:30px;">
   
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">RV College of Engineering</div>
        <div class="right menu">
           <a class="item" href="student_menu.php">Home</a>
		  <div class="ui dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">Messages </a>
              <a class="item">Timetable</a>
              <a class="item">Profile</a>
			  
            </div>
          </div>
          <a class="item" href="student_info.html">Information</a>
          <a class="item" href="stats.html">Stats</a>
		  
		  <a class="item" href="logout.php">Logout</a>
        </div>
      </div>
      <img src="images/RV_logo.png" class="ui medium image"  style="margin-bottom:6em;width:250px;font-size:1rem" >
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
          Student
        </h1>
        <p>View your attendance here</p>
        <div class="large basic inverted animated fade ui button">
          <div class="visible content"> Lab session </div>
          <div class="hidden content">
		  <a href="view_attendance.php">View Now</a>
		  </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ui large inverted vertical sidebar menu">
    <a class="active item">
      Messages <span class="ui label">213</span>
    </a>
    <a class="item" href="student_timetable.php">
      Timetable <span class="ui label">113</span>
    </a>
    <div class="item">
      <b>Profile</b>
      <div class="menu">
	  
        <a class="item" href="change_student.php" >
          Change Password <span class="ui label">11</span>
        </a>
        <a class="item" href="student_details_update.php">
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
    
    <div class="fifteen wide column">
      <div class="ui four column center aligned stackable divided grid">
		
        <div class="column">
          <div class="ui icon header">
          <i class="circular tasks link red inverted launch icon button"></i>
            Menu 
          </div>
          <p>Opions for the update and modify details.</p>
      
        </div>
        <div class="column">
          <div class="ui icon header">
           <i class="circular inverted red info link icon positive button"></i>
            Register
          </div>
          <p>Register for a particular lab session.</p>
      
        </div>
        <div class="column">
          <div class="ui icon header">
          <a href="view_attendance.php">  <i class="circular table inverted red link icon"></i></a>
            Report
          </div>
          <p>Reports on various criterions are found here.</p>
      
        </div>
		 <div class="column">
          <div class="ui icon header">
            <i class="circular lock inverted red link icon"></i>
            Log out 
          </div>
          <p>Sign out as a student and lock the setting.</p>
      
        </div>
      </div>
    </div>
  </div> 
<div class="ui basic modal">
    <div class="header">
		Register for a Session 
    </div>
    <div class="content ">
	  <div class="center">
      <form class="ui secondary form segment" name="input" action="temp_logbook1.php" method="post">
<?php if(isset($_SESSION['Login.Error']) && ($_SESSION['student']==false))  {  echo "<div class='ui inverted red segment'>"; echo $_SESSION['Login.Error']; echo "</div>";
 unset($_SESSION['Login.Error']); } 
 $con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
			if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			else{
				$qry= "SELECT * FROM Session WHERE activity='1' ";
				$result=mysqli_query($con,$qry);
				}
				?>
 
   <div class=" field">
    <label>Subject</label>
    <div class="ui  selection dropdown">
  <input name="sub" type="hidden">
  <div class="default text"><?php if(mysqli_num_rows($result) <= 0) 
								echo "No session is active right now."; else echo "Subject"; ?></div>
  <i class="dropdown icon"></i>
  <div class="menu">
    <?php
		$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
			if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			else{
				$qry= "SELECT * FROM Session WHERE activity='1' ";
				$result=mysqli_query($con,$qry);
				while ($row=mysqli_fetch_array($result))
					{	echo "<div class='item data-value='";
						echo $row['sub'];
						echo "'>";
						echo $row['sub'];
						echo "</div>";
					}
			}		
	?>
  </div>
</div>
  </div>
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
	</form>
  </div>  
  
  <div class="ui primary inverted blue page grid segment" style="	background-image:url(images/12.jpg);background-repeat: no-repeat;  background-size:cover;">
  
      </div>
</body>

</html>