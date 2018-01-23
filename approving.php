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

if(isset($_POST['app']))
{
	$a= $_POST['app'];
	foreach ($a as $a1){
		$qry= "SELECT * FROM logbook_temp where USN='$a1'";
		$result=mysqli_query($con,$qry);
		if($result) {
			while ($row=mysqli_fetch_array($result))
			{	$sub_name= $row['sub_name'];
				$log_in= $row['log_in'];
				$s=$a1;
				$sid= $row['sid'];
				$sys=$row['system_no'];
				$q= "insert into logbook_final values ('$sub_name','$log_in','$sid','$s','$sys')";
				$r=mysqli_query($con,$q);
				if($r)
					$_SESSION['Approval_Status']= "SUCCESSFULLY APPROVED!!";
					
					
				else
					$_SESSION['Approval_Status']= "Sorry!!Could not approve the students!";
					
					
				
			}
			
			
		}
	}
	}
	$sid=$_SESSION['sid'];
$q1= "update session set activity='0' where sid='$sid'";
			$r1=mysqli_query($con,$q1);
				if($r1)
					$_SESSION['Approval_Status']= "SUCCESSFULLY APPROVED!!";
					
					
				else
					$_SESSION['Approval_Status']= "Sorry!!Could not inactivate the session!";
					
$q2= "delete from logbook_temp where sid='$sid'";
			$r2=mysqli_query($con,$q2);
				if($r2)
					$_SESSION['Approval_Status']= "SUCCESSFULLY APPROVED!!";
					
					
				else
					$_SESSION['Approval_Status']= "Sorry!!Could not clear the temporary log book the session!";




header('Location: approved.php'); 








?>