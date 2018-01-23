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


$password=$_POST['password'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];



$qry= "SELECT * FROM admin where Username='admin'";
$result=mysqli_query($con,$qry);

	if($result) {
		$row=mysqli_fetch_array($result);
		
		$hash=$row['Password'];
		echo $hash;
		echo $password;
		$hashAndSalt = password_hash($password, PASSWORD_BCRYPT);
		echo $hashAndSalt;
		echo "<br />";
		
	if (password_verify($password, $hash)) {
		if(!(strcmp($password1,$password2)))
		{	$hashAndSalt = password_hash($password1, PASSWORD_BCRYPT);
		
			echo $hashAndSalt;
			$qry= "update admin set password='$hashAndSalt'";
			$result=mysqli_query($con,$qry);
			if($result)
			{ $_SESSION['Message']="Successfully changed the password";
				header('Location: admin_success_msg.php');
			}
		}
		else
		{
			$_SESSION['Login.Error']= "New passwords don't match. Try again";
			echo $_SESSION['Login.Error'];
			header('Location: change_admin.php');
		}
	}
	else {			
			$_SESSION['Login.Error']= "Invalid old password entered. Try again";
			echo $_SESSION['Login.Error'];
			echo "not verified";
			header('Location: change_admin.php');
		}
		
        }
        
	
?>



