<?php
session_start();






$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");

if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}





$qry= "SELECT * FROM student";
$result=mysqli_query($con,$qry);

	if($result) {
		while ($row=mysqli_fetch_array($result))
		{	
			
			$usn=$row['USN'];
			echo "INSERT INTO `student_log`(`usn`, `password`) VALUES ('";
			echo $usn;
			echo "','";
			$hashAndSalt = password_hash($usn, PASSWORD_BCRYPT);
			echo $hashAndSalt;
			echo "')";
			echo ";";
			echo "<br />";
		}
	}
	else {			
			echo "couldn't generate";
		}
		
   
	
	echo "admin hash values:";
	echo "<br />";
	echo "INSERT INTO `admin` VALUES (";
	echo "'admin','";
	$hashAndSalt = password_hash('admin', PASSWORD_BCRYPT);
	echo $hashAndSalt;
	
	echo ")";
	echo "<br />";
	
	echo "faculty hash values:";
		echo "<br />";
	$a=['hod','vp','principal','counsellor1','counsellor2','counsellor3','counsellor4','faculty'];
	foreach($a as $a1)
	{
		echo "INSERT INTO `faculty` VALUES ('";
		echo $a1;
		echo "','";
		$hashAndSalt = password_hash($a1, PASSWORD_BCRYPT);
		echo $hashAndSalt;
		echo ")";
		echo ";";
		echo "<br />";
	}	
	
?>



