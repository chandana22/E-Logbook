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
		$row=mysqli_fetch_array($result);
		
	for($i=0;$i<=$N;$i++)
	{	$c= $aDoor[$i];
		$num=0;
		
		
		
		
		while($num<=$c){
			
			if($num==$c){
			echo " <table class='ui inverted celled table segment'><thead><tr><th>Session_id</th><th>Subject</th><th>USN</th><th>Timestamp</th></tr></thead><tbody>";
								while ($row=mysqli_fetch_array($result))
								{	echo "<tr><td>";
									echo $row['sid'];
									echo "</td><td>";
									echo $row['sub_name'];
									echo "</td><td>";
									echo $row['USN'];
									echo "</td><td>";
									echo $row['log_in'];
									
									echo "</td></tr>";
									
								}
								echo "</tbody></table>";
							}
							$num++;
			}

			}
		}
		}
		}
		}
	
	
  ?>