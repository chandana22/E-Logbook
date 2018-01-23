<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title> Student </title>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700|Open+Sans:300italic,400,300,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" type="text/css" href="../packaged/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="homepage.css">

  <script src="jquery.js"></script>
  <script src="../packaged/javascript/semantic.js"></script>
  <script src="forms.js"></script>

</head>
<body id="home">
  <div class="ui inverted page grid masthead segment" >
    <div class="column">
      <div class="inverted secondary pointing ui menu">
        <div class="header item">RV College of Engineering</div>
        <div class="right menu">
          <div class="ui top right pointing mobile dropdown link item">
            Menu
            <i class="dropdown icon"></i>
            <div class="menu">
              <a class="item">Classes</a>
              <a class="item">Cocktail Hours</a>
              <a class="item">Community</a>
            </div>
          </div>
		  <<a class="item" href="homepage.html">Home</a>
            <div class="ui dropdown link item">
            Departments
            <i class="dropdown icon"></i>
            <div class="menu">
			  <a class="item">Electronics and Comm</a>
              <a class="item">Computer Science</a>
              <a class="item">Information Science</a>
			  <a class="item">Biotechnology</a>
			  <a class="item">Mechanical</a>
             </div>
          </div>
		  <a class="item" href="history.html">History</a>
          <a class="item" href="about.html">About</a>
		  
		  <a class="item" >Contact us</a>
        </div>
      </div>
      <img src="images/RV_logo.png" class="ui medium image"  style="margin-bottom:6em; width:200px;font-size:1rem" >
      <div class="ui hidden transition information">
        <h1 class="ui inverted header">
          Student
        </h1>
        <p>Log in as a Student to view your attendance status and reports </p>
        
      </div>
    </div>
  </div>
  

  <div class="ui page grid overview segment" style="padding-left:0px;padding-right:0px">
    <div class="ui two wide column"></div>
    <div class="twelve wide column">
	
  
      <div class="ui two column center aligned stackable divided grid" >
       


        <div class="column">
			
			<img src="images/student_log.jpg" class="circular medium ui image" >
		</div> 
		
		
		<div class="column">
		<?php
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
<form class="ui inverted black secondary form segment" name="input" action="temp_logbook1.php" method="post">
<?php if(isset($_SESSION['Login.Error']) && ($_SESSION['student']==false))  {  echo "<div class='ui inverted red segment'>"; echo $_SESSION['Login.Error']; echo "</div>";
 unset($_SESSION['Login.Error']); } 	 ?>
 
   <div class="field">
    <label>Subject</label>
    <div class="ui selection dropdown">
  <input name="sub" type="hidden">
  <div class="default text"><?php if(mysqli_num_rows($result) <= 0) 
								echo "No session is active right now."; else echo "Select"; ?></div>
  <i class="dropdown icon"></i>
  <div class="menu">
    <?php
		$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
			if (mysqli_connect_errno())
				{
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
			else{
				$qry= "SELECT distinct sub FROM Session WHERE activity='1' ";
				$result=mysqli_query($con,$qry);
				while ($row=mysqli_fetch_array($result))
					{	echo "<div class='item' data-value='";
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
  <div class="field">
    <label>USN</label>
    <div class="ui left red labeled icon input">
      <input placeholder="USN" type="text" name="USN">
      <i class="red user icon"></i>
      <div class="ui corner label">
        <i class="icon asterisk"></i>
      </div>
    </div>
  </div>

  
  <div class="red ui submit button">Register</div>
</form>
  </div>
		</div>
      </div>
    </div>


  <br />
  <br/>
  <br/>
  
  <div class="ui primary inverted blue page grid segment" style="	background-image:url(images/12.jpg);background-repeat: no-repeat;  background-size:cover;">
  
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