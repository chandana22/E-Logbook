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
$subj=$_SESSION['subj'];
$batch=$_SESSION['batch'];
$qry= "SELECT * FROM Subject where sub_name='$subj'";
							$result=mysqli_query($con,$qry);
							if($result) {
								$row=mysqli_fetch_array($result);
								{	$sem= $row['sem'];
								}
								}



$qry= "SELECT * FROM student where sem= '$sem' and batch='$batch' ";
$result=mysqli_query($con,$qry);
if($result) {
				if(mysqli_num_rows($result) <= 0) {
				echo "<p> No students have registered for this lab session. Click approve to close this session</p>"; 
						
						
			}
	else {	
				if(isset($_SESSION['table']))
					$table=$_SESSION['table'];
				if(isset($_SESSION['exp']))
					$exp=$_SESSION['exp'];
				echo $exp;
				echo $table;
				$e= 'ex' . $exp;
				echo $e;
					while ($row=mysqli_fetch_array($result))
					{	$usn=$row['USN'];
						
						$v=$_POST[$usn];
						echo $v;
						
						$q= "update $table set $e = '$v' where USN='$usn' and sub='$subj'";
					//	UPDATE `elogbook`.`marks_sem2` SET $e = '10' WHERE `marks_sem2`.`USN` = '1RV12IS007' AND `marks_sem2`.`sub` = 'Physics';
					
				$r=mysqli_query($con,$q);
				if($r)
				{	$_SESSION['Approval_Status']= "SUCCESSFULLY APPROVED!!";
					
				}	
				else
				{	$_SESSION['Approval_Status']= "Sorry!!Could not approve the students!";
					
				}


} }
}
header('Location: marks_success.php');
?>