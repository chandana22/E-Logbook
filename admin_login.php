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
$qry= "SELECT * FROM Admin WHERE Username='$username'";
$result=mysqli_query($con,$qry);
$_SESSION['admin']=false;
	if($result) {
	
		$row=mysqli_fetch_array($result);
		$hashAndSalt=$row['Password'];
	
	if (password_verify($password, $hashAndSalt)) {
		
		$_SESSION['admin']=true;
		if (isset($_SESSION["student"])) $_SESSION["student"]=false;
		if (isset($_SESSION["faculty"])) $_SESSION["faculty"]=false;
		header('Location: admin_menu.php');
		}
		else {			
			$_SESSION['Login.Error']= "Invalid Username and Password. Please try again";
			header('Location: admin_log.php');
		}
		
        }
        
		
?>
