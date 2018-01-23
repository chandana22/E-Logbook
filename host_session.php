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
if(isset($_SESSION['semester']))
	unset($_SESSION['semester']);
if(isset($_SESSION['batch']))
	unset($_SESSION['batch']);
if(isset($_POST['semester']))
{	
	$_SESSION['semester']=$_POST['semester'];
	
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
				<form class="ui teal secondary form segment" name="input" action="host_session2.php" method="post">
				<?php if(isset($_SESSION['Session.Error']))  {  echo "<div class='ui inverted red segment'>"; echo $_SESSION['Session.Error']; echo "</div>";
 unset($_SESSION['Session.Error']); } ?>
				<div class="ui form">
				  <div class="ui five fields">
				  
					<div class="field">
						<label>Semester</label>
						<div class='ui fluid selection dropdown'>
							<input name="semester" type="hidden" id='sem'>
							 <div class="default text"> <?php if(!isset($_SESSION['semester'])) echo "Select";  else { $semester=$_SESSION['semester']; echo $semester; }
							?>  </div>
							
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
			<script>
			$("#sem").on('change', function() {
			$(this.form).attr("action", "host_session.php");
			this.form.submit();
			});
			</script>
			
	
  <div class="field">
      <label>Subject</label>
	    <?php
		if(!isset($_SESSION['semester']))
		{ 	
			
			echo "Please select a semester first.";
		}	
		else {
			
			echo "<div class='ui fluid selection dropdown'>"; }
			?>
		<input name="subject" type="hidden" id="subject" >
		<div class="default text"><?php if(isset($_SESSION['semester'])) echo "Select"; ?> </div>
		<i class="dropdown icon"></i>
		<div class="menu"   >
								
		<?php
			if(isset($_SESSION['semester']))
			{	$semester=$_SESSION['semester'];
				$qry= "SELECT * FROM Subject WHERE sem='$semester' ";
				$result=mysqli_query($con,$qry);
				while ($row=mysqli_fetch_array($result))
				{	echo "<div class='item' data-value='";
					echo $row['sub_name'];
					echo "'>";
					echo $row['sub_name'];
					echo "</div>";
				}
			}
		?>
							
							</div>
<?php if(isset($_SESSION['semester'])) echo "</div>"; ?>
  </div>
  
  
  
    <div class="field" >
	<label>Batch</label>
	<div class="grouped inline fields" >
		<div class="field">
		
      <div class="ui radio left floated checkbox">
        <input name="batch"  type="radio" value="B1" id="terms">
        <label>B1</label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio left floated checkbox">
        <input name="batch"  type="radio" value="B2" id="terms">
        <label>B2</label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio left floated checkbox">
        <input name="batch" type="radio" value="B3" id="terms">
        <label>B3</label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio left floated checkbox">
        <input name="batch" type="radio" value="B4" id="terms">
        <label>B4</label>
      </div>
    </div>
	</div>
	</div>
	

<div class="field">
    <label>Lab number</label>
	<div class="grouped inline fields">
	<div class="field">
    <div class="ui toggle radio checkbox">
  <input name="lab" type="radio" value="L1" id="labs">
  <label>Lab 1</label>
</div>
</div>
<div class="field">
 <div class="ui toggle radio checkbox">
  <input name="lab" type="radio" value="L2" id="labs">
  <label>Lab 2</label>
</div>
</div>
<div class="field">
 <div class="ui toggle radio checkbox">
  <input name="lab" type="radio" value="L3" id="labs">
  <label>Lab 3</label>
</div>
</div>
<div class="field">
 <div class="ui toggle radio checkbox">
  <input name="lab" type="radio" value="L4" id="labs">
  <label>Lab 4</label>
</div>
</div>
  </div>
 </div>
 

 













  </div>
  <a> <div class="teal centre aligned ui positive button" >Host</div></a>

	<div class="ui basic modal">
    <div class="header">
		Create Session 
    </div>
    <div class="content">
      <div class="left">
        <i class="warning icon"></i>
      </div>
      <div class="right">
        <p>Are you sure you want to <b>host</b> this session and <b>allow students to register?</b>?</p>
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