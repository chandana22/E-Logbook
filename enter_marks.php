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
if(isset($_SESSION['subj']))
	unset($_SESSION['subj']);
if(isset($_SESSION['batch']))
	unset($_SESSION['batch']);
if(isset($_POST['subj']))
{	
	$_SESSION['subj']=$_POST['subj'];
	
}
if(isset($_POST['batch']) && ((isset($_SESSION['batch']))))
{
	$_SESSION['batch']=$_POST['batch'];
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
		<br />
        
      </div>
    </div>
  </div>
  

  <div class="ui page grid overview segment" style="padding-left:0px;padding-right:0px">
    <div class="ui two wide column"></div>
    <div class="twelve center aligned wide column">
	    <div class="ui column center aligned stackable divided grid" >
            <div class="column">
				<form class="ui teal secondary form segment" name="input" action="entering_marks.php" method="post">
				<?php if(isset($_SESSION['Session.Error']))  {  echo "<div class='ui inverted red segment'>"; echo $_SESSION['Session.Error']; echo "</div>";
 unset($_SESSION['Session.Error']); } ?>
				
				  <div class="ui three fields">
					
					
					<div class="field">
						<label>Subject</label>
						<div class='ui fluid selection dropdown'>
							<input name="subj" type="hidden" id='sub'>
							 <div class="default text">
							 <?php 
							 $con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

								if (mysqli_connect_errno())
								{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
								$qry= "SELECT distinct sub FROM Session WHERE activity='1' ";
								
								$result=mysqli_query($con,$qry);
							 
							 
							 if(!isset($_SESSION['subj'])) echo "Select"; else if(mysqli_num_rows($result) <= 0) 
								echo "No session is active right now."; else { $subj=$_SESSION['subj']; echo $subj; }
							?> 
							</div>
							
						<i class="dropdown icon"></i>
							<div class="menu"  id="m" >
								<?php
								
								
								
								
								if(mysqli_num_rows($result) <= 0) 
								echo "No session is active right now."; 
								while ($row=mysqli_fetch_array($result))
								{	echo "<div class='item' data-value='";
									echo $row['sub'];
									echo "'>";
									echo $row['sub'];
									echo "</div>";
								}
								?>
							</div>
							
						</div>
					</div>
					<script>
			$("#sub").on('change', function() {
    $(this.form).attr("action", "enter_marks.php");
	this.form.submit();
});
			</script>
			
	
		
  <div class="field">
      <label>Batch</label>
	    <?php
		if(!isset($_SESSION['subj']))
		{ 	
			
			echo "Please select a subject first.";
		}	
		else {
			
			echo "<div class='ui fluid selection dropdown'>"; }
			?>
	  <input name="batch" type="hidden" id='welcome'>
     <div class="default text"><?php if(isset($_SESSION['subj'])) echo "Select"; ?> </div>
     <i class="dropdown icon"></i>
     <div class="menu">
		
	<?php	
		
     
								if(isset($_SESSION['subj'])){
								$qry= "SELECT distinct batch FROM Session WHERE sub='$subj' ";
								$result=mysqli_query($con,$qry);
								while ($row=mysqli_fetch_array($result))
								{	echo "<div class='item' data-value='";
									echo $row['batch'];
									echo "'>";
									echo $row['batch'];
									echo "</div>";
								}
								}
								
								
								
								?>
    

	
    
	

  </div>
<?php if(isset($_SESSION['subj'])) echo "</div>"; ?>
  </div>
  
  
  <div class="field">
      <label>Experiment number</label>
	    <?php
		if(!isset($_SESSION['subj']))
		{ 	
			
			echo "Please select a subject first.";
		}	
		else {
			
			echo "<div class='ui selection dropdown'>"; }
			?>
		<input name="experiment" type="hidden" id="exp" >
		<div class="default text"><?php if(isset($_SESSION['subj'])) echo "Select"; ?> </div>
		<i class="dropdown icon"></i>
		<div class="menu"   >
								
		<?php
			if(isset($_SESSION['subj']))
			{	$sub=$_SESSION['subj'];
				$qry= "SELECT * FROM Subject WHERE sub_name='$sub' ";
				$result=mysqli_query($con,$qry);
				$row=mysqli_fetch_array($result);
				
				$exps=$row['no_of_experiments'];
				
				$ex=1;
				while ($ex<=$exps)
				{	echo "<div class='item' data-value='";
					echo $ex;
					echo "'>";
					echo $ex;
					echo "</div>";
					$ex++;
				}
			}
		?>
								
<?php if(isset($_SESSION['semester'])) echo "</div>"; ?>
  </div>
</div>
  </div>
  
  <br />
  <div class="teal centre aligned ui submit button" >List</div>

  

 

  </div>
   </form>
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