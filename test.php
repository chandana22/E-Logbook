<?php
$aDoor = $_POST['app'];
  if(empty($aDoor))
  {
    echo("You didn't select any student.");
  }
  else
  {
    $N = count($aDoor);
	$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
	$qry= "SELECT * FROM logbook_temp WHERE approval='0'";
	$result=mysqli_query($con,$qry);
	if($result) {
	if(mysqli_num_rows($result) <= 0) {
		echo "<p> No student is approved right now. Please try again.</p>"; 
	}
	else {
	for($i=0;$i<$N;$i++)
	{	$c= $aDoor[$i];
		$num=0;
		echo " c value is";
		echo $c;
		while ($row=mysqli_fetch_array($result))
		{	echo $num;
		echo $c;
		if($num<$c){
			echo " num value is";
			echo $num;
			$num++;	
			}
		else{
		echo "in else";
			$sid=$row['sid'];
			$sub=$row['sub_name'];
			$usn=$row['USN'];
			$log=$row['log_in'];
			$q="insert into logbook_final values ( '$sid','$'sub', '$usn','$log')";
			$r=mysqli_query($con,$q);
			if($r) {
			if(mysqli_num_rows($r) <= 0) {
				echo "<p> No student is approved right now. Please try again.</p>"; 
			}							
			else
			{	echo "inserted";
				echo "done";
		}
		}
		}
		}
		
		}
		}
		}
		}
		
	
    
  }
  ?>