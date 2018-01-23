<?php

$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


$qry= "SELECT * FROM subject";
$result=mysqli_query($con,$qry);
$s=0;
if($result) {
while ($row=mysqli_fetch_array($result))
{			
			$sem=$row['sem'];
			$sub=$row['sub_name'];
			
			$batch=['B1','B2','B3','B4'];
			foreach ($batch as $b1)
			{	$s++;
				echo "INSERT INTO `session`(`sid`, `sem`, `sub`, `log_in`, `faculty`, `batch`, `lab_no`, `activity`) VALUES ('$s','$sem','$sub',now(),'faculty','$b1','Lab1','1');";
				echo "<br />";
			}
		}
	}
	
	else {			
			echo "couldn't generate";
		}
		
   echo "Populating temp_logbook";
   echo "<br />";
	
			$q="select * from student left join session on session.sem=student.sem and session.batch=student.batch";
			$r=mysqli_query($con,$q);

			if($r) {
			$sys=0;
		while ($row=mysqli_fetch_array($r))
		{	$sys++;		
			$sem=$row['sem'];
			$sid=$row['sid'];
			$sub=$row['sub'];
			$usn=$row['USN'];
			$batch=$row['batch'];
		
			echo "INSERT INTO `elogbook`.`logbook_temp` (`sid`, `sub_name`, `USN`, `log_in`, `system_no`, `approval`, `batch`) VALUES ('$sid', '$sub', '$usn', CURRENT_TIMESTAMP, '$sys', '0', '$batch');";
				
				echo "<br />";
			}
		}
	
	
	else {			
			echo "couldn't generate";
		}
		
		$qry= "SELECT * FROM subject";
$result=mysqli_query($con,$qry);
$s=0;
if($result) {
while ($row=mysqli_fetch_array($result))
{			
			$sem=$row['sem'];
			$sub=$row['sub_name'];
			
			$batch=['B1','B2','B3','B4'];
			foreach ($batch as $b1)
			{	$s++;
				echo "INSERT INTO `session`(`sid`, `sem`, `sub`, `log_in`, `faculty`, `batch`, `lab_no`, `activity`) VALUES ('$s','$sem','$sub',now(),'faculty','$b1','Lab1','1');";
				echo "<br />";
			}
		}
	}
	
	else {			
			echo "couldn't generate";
		}
		
		
	echo "<br /><br />";	
   echo "Populating logbook_final";
   echo "<br />";
	
			$q="select * from logbook_temp";
			$r=mysqli_query($con,$q);

			if($r) {
			$sys=0;
		while ($row=mysqli_fetch_array($r))
		{	$sys++;		
			
			$sid=$row['sid'];
			$sub=$row['sub_name'];
			$usn=$row['USN'];
			$batch=$row['batch'];
			$log=$row['log_in'];
			$sid=$row['sid'];
			$nsid=$sid+100;
		
		
			echo "INSERT INTO `elogbook`.`logbook_final` (`sid`, `sub_name`, `USN`, `log_in`, `system_no`,`batch`) VALUES ('$sid', '$sub', '$usn','$log', '$sys', '$batch');";
			echo "<br />";
			echo "UPDATE `elogbook`.`logbook_temp` set sid='$nsid' where sid='$sid';";
				
				echo "<br />";
			}
		}
	
	
	else {			
			echo "couldn't generate";
		}
	
	
	
?>



