<?php
session_start();
/*$hashAndSalt = password_hash('admin123', PASSWORD_BCRYPT);
echo $hashAndSalt;
*/

if(isset($_SESSION['student'])==false) {
$_SESSION['Login.Error']= "Student login required";
header('Location: student_log.php'); 
}


$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$USN=$_SESSION['usn_of_stu'];
$password=$_POST['password'];
$password1=$_POST['password1'];
$password2=$_POST['password2'];



$qry= "SELECT * FROM student_log WHERE usn='$USN'";
$result=mysqli_query($con,$qry);

	if($result) {
		$row=mysqli_fetch_array($result);
		
		$hash=$row['password'];
		
	if (password_verify($password, $hash)) {
		if(!(strcmp($password1,$password2)))
		{	$hashAndSalt = password_hash($password1, PASSWORD_BCRYPT);
		
			echo $hashAndSalt;
			$qry= "update student_log set password='$hashAndSalt' where usn='$USN'";
			$result=mysqli_query($con,$qry);
			if($result)
			{ $_SESSION['Message']="Successfully changed the password";
				header('Location: student_success_msg.php');
			}
		}
		else
		{
			$_SESSION['Login.Error']= "New passwords don't match. Try again";
			echo $_SESSION['Login.Error'];
			header('Location: change_student.php');
		}
	}
	else {			
			$_SESSION['Login.Error']= "Invalid old password entered. Try again";
			echo $_SESSION['Login.Error'];
			header('Location: change_student.php');
		}
		
        }
        
	
?>



