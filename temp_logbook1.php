<?php
session_start();

$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$USN=$_POST['USN'];

$sub=$_POST["sub"];
	

$qry= "SELECT * FROM Student WHERE USN='$USN'";
$result=mysqli_query($con,$qry);
$row1=mysqli_fetch_array($result);
$s=$row1['sem'];
$sbat=$row1['batch'];
$_SESSION['student']=false;
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			$qry= "SELECT * FROM Session where sub='$sub' and activity='1'";
			$res=mysqli_query($con,$qry);
			if (!($res)) 
			{
				$_SESSION['Login.Error']=" Could not create an entry . Try again ";
				header('Location: temp_logbook.php');
			}
			else
			{	while ($row=mysqli_fetch_array($res))
					{	$sem=$row['sem'];
						$b=$row['sid'];
						$bat=$row['batch'];
					}
				if($sem != $s || $bat!=$sbat)
				{
					$_SESSION['Login.Error']= "The student does not belong to the lab/batch of this subject session. Please try again";
					$_SESSION['m']=	$sub;
					$_SESSION['n']=	$USN;
					header('Location: temp_logbook.php');
				}
				else
				{
					$qry= "INSERT INTO logbook_temp (sid, sub_name ,USN ,log_in ,system_no ,approval) VALUES ( '$b','$sub', '$USN' , now() , '12IS01' , '0')";
					$result=mysqli_query($con,$qry);
					if (!($result)) 
					{
						$_SESSION['Login.Error']= "Already registered for this session";
						header('Location: temp_logbook.php');
					}
					else{
						header('Location: temp_success.php');
						}
				}
			}
		}
		else {			
			$_SESSION['Login.Error']= "Invalid Username. Please try again";
			header('Location: temp_logbook.php');
		}
		
        }
        
		
?>
