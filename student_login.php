<?php
session_start();

$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$USN=$_POST['USN'];
$password=$_POST['password'];



$_SESSION['USN']=$_POST["usn"];
$qry= "SELECT * FROM student_log WHERE usn='$USN'";
$result=mysqli_query($con,$qry);
$_SESSION['student']=false;
	if($result) {
		$row=mysqli_fetch_array($result);
		$hashAndSalt=$row['password'];
	
	if (password_verify($password, $hashAndSalt)) {
  
		
		$_SESSION['student']=true;
		$_SESSION['usn_of_stu']=$USN;
		if (isset($_SESSION["admin"])) $_SESSION["admin"]=false;
		if (isset($_SESSION["faculty"])) $_SESSION["faculty"]=false;
		header('Location: student_menu.php');
		}
		else {			
			$_SESSION['Login.Error']= "Invalid Username and Password. Please try again";
			header('Location: student_log.php');
	
		}
		
        }
        
		
?>

