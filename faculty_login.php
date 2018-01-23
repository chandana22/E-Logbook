<?php
session_start();

$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username=$_POST['username'];
$password=$_POST['password'];
$_SESSION['username']=$_POST["username"];
$qry= "SELECT * FROM Faculty WHERE username='$username'";
$result=mysqli_query($con,$qry);
$_SESSION['faculty']=false;
	if($result) {
		$row=mysqli_fetch_array($result);
		$hashAndSalt=$row['password'];
	
	if (password_verify($password, $hashAndSalt)) {
		
		$_SESSION['faculty']=true;
		if (isset($_SESSION["admin"])) $_SESSION["admin"]=false;
		if (isset($_SESSION["student"])) $_SESSION["student"]=false;
		header('Location: faculty_menu.php');
		}
		else {			
			$_SESSION['Login.Error']= "Invalid Username and Password. Please try again";
			header('Location: faculty_log.php');
		}
		
        }
        
		
?>
