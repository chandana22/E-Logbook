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
			<a class="active red item" data-tab="perstudent">
				Student Complete
			</a>
			<a class="active red item" data-tab="graphical">
				Graphs
			</a>
			<a class="active red item" data-tab="session">
				Session
			</a>
			<a class="active red item" data-tab="marks">
				Marks
			</a>
			
			
		</div>
	<div class="ui divided inbox selection list active tab" data-tab="student">
		 
		 
		    <div class="ui  raised red segment">
    
			<br /> 
			
		<div class="column">

		
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
		
		<div class="ui divided inbox selection list tab" data-tab="subject">
			 
			  <div class="ui  raised red segment">
			 <?php
			
			$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			?>
			<form class="ui secondary form segment" name="input" action="subject_wise.php" method="post">
				
				
				  <div class="field">
					<label>Subject</label>
	  
			
			<div class='ui selection dropdown'>
			
		<input name="subject" type="hidden" id="subject" >
		<div class="default text">Select</div>
		<i class="dropdown icon"></i>
		<div class="menu"   >
				  
					<?php
			
				
				$qry= "SELECT * FROM Subject";
				$result=mysqli_query($con,$qry);
				while ($row=mysqli_fetch_array($result))
				{	echo "<div class='item' data-value='";
					echo $row['sub_name'];
					echo "'>";
					echo $row['sub_name'];
					echo "</div>";
				}
			
		?>
							
							</div>
							</div>
							</div>
							 <a> <div class="teal centre aligned ui submit button" >List</div></a>
							
							</form>
							</div>
							

</div>
  
		<div class="ui divided inbox selection list tab" data-tab="semester">
			 
			<form class="ui teal secondary form segment" name="input" action="sem_wise.php" method="post">
				
				
				 
				  
					<div class="field">
						<label>Semester</label>
						<div class='ui selection dropdown'>
							<input name="semester" type="hidden" id='sem'>
							 <div class="default text">Select</div>
							
							<i class="dropdown icon"></i>
							<div class="menu"  id="m" >
								<div class="item" data-value="1">1</div>
								<div class="item" data-value="2">2</div>
								<div class="item" data-value="3">3</div>
								<div class="item" data-value="4">4</div>
								<div class="item" data-value="5">5</div>
								<div class="item" data-value="6">6</div>
								<div class="item" data-value="7">7</div>
								<div class="item" data-value="8">8</div>
							</div>
							
						</div>
					</div>
					<a> <div class="teal centre aligned ui submit button" >Show</div></a>
				</form>
				</div>
							
			
	<div class="ui divided inbox selection list tab" data-tab="graphical">
		 
		 
		    <div class="ui  raised red segment">
    
			<br /> 
			
		<div class="column">

		
		<div class="ui buttons">
	<a href="gr.php"><div class="ui fade blue animated large button" id="b1">
  <div class="hidden content">Semester wise graph</div>
  <div class="visible content">
    <i class="briefcase icon"></i>  <i class="briefcase icon"></i>    <i class="briefcase icon"></i>   <i class="briefcase icon"></i>  <i class="briefcase icon"></i>  <i class="briefcase icon"></i> 
  </div>
</div></a>
  <div class="or"></div>
<a href="sub_gr.php">		<div class="ui fade blue large animated  button" id="b2">
  <div class="hidden content">Subject wise graph </div>
  <div class="visible content">
    <i class="book icon"></i>  <i class="book icon"></i> <i class="book icon"></i>  <i class="book icon"></i>  <i class="book icon"></i>  <i class="book icon"></i>
  </div>
</div>
</a>


 </div>
</div>
			
		
		</div>
		</div>
		
		  
		  		<div class="ui divided inbox selection list tab" data-tab="perstudent">
			 
			  <div class="ui  raised red segment">
			 <?php
			
			$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			?>
			<form class="ui secondary form segment" name="input" action="perstudent1.php" method="post">
				
				 <div class="field">
    <label>Username</label>
    <div class="ui left red labeled icon input">
      <input placeholder="USN of the student to be searched" type="text" name="USN">
      <i class="red user icon"></i>
      <div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
    </div>
  </div>
				
				  <div class="field">
					<label>Subject</label>
	  
			
			<div class='ui selection dropdown'>
			
		<input name="subject" type="hidden" id="subject" >
		<div class="default text">Select</div>
		<i class="dropdown icon"></i>
		<div class="menu"   >
				  
					<?php
			
				
				$qry= "SELECT * FROM Subject";
				$result=mysqli_query($con,$qry);
				while ($row=mysqli_fetch_array($result))
				{	echo "<div class='item' data-value='";
					echo $row['sub_name'];
					echo "'>";
					echo $row['sub_name'];
					echo "</div>";
				}
			
		?>
							
							</div>
							</div>
							</div>
							 <a> <div class="teal centre aligned ui submit button" >List</div></a>
							
							</form>
							</div>
							

</div>
		  
<div class="ui divided inbox selection list active tab" data-tab="session">
		 
		 
		    <div class="ui  raised red segment">
    
			<br /> 
			
		<div class="column">

		
		<div class="ui buttons">
	<a href="active_session.php"><div class="ui vertical teal animated large button" id="b1">
  <div class="hidden content">Active Session</div>
  <div class="visible content">
    <i class="tasks icon"></i>   <i class="tasks icon"></i> <i class="tasks icon"></i> <i class="tasks icon"></i> <i class="tasks icon"></i>
  </div>
</div></a>
  <div class="or"></div>
<a href="ended_session.php">		<div class="ui vertical teal large animated  button" id="b2">
  <div class="hidden content">Ended Session</div>
  <div class="visible content">
    <i class="warning icon"></i><i class="warning icon"></i><i class="warning icon"></i><i class="warning icon"></i><i class="warning icon"></i>
  </div>
</div>
</a>


 </div>
</div>
			
		
		</div>
		</div>
				 
<div class="ui divided inbox selection list active tab" data-tab="marks">
		 
		 
		    <div class="ui  raised red segment">
    
			<br /> 
			
		<div class="column">

		
		<div class="ui buttons">
	<a href="each_mark.php"><div class="ui vertical teal animated large button" id="b1">
  <div class="hidden content">Individual student</div>
  <div class="visible content">
    <i class="user icon"></i>  <i class="user icon"></i>   <i class="user icon"></i>  <i class="user icon"></i> <i class="user icon"></i>   <i class="user icon"></i>
  </div>
</div></a>
  <div class="or"></div>
<a href="all.php">		<div class="ui vertical teal large animated  button" id="b2">
  <div class="hidden content">Per subject</div>
  <div class="visible content">
    <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i> <i class="users icon"></i>
  </div>
</div>
</a>


 </div>
</div>
			
		
		</div>
		</div>

		 
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
	  </div>
   
</div>

</body>

</html>