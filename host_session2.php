<?php
session_start();
if(isset($_SESSION['admin'])==false) {
$_SESSION['Login.Error']= "Admin login required";
header('Location: admin_log.php'); 
}

		
								$semester= $_SESSION['semester'];
								$sub = $_POST['subject'];
								$lab_no = $_POST['lab'];
								$batch= $_POST['batch'];
								$_SESSION['experiment']=$_POST['experiment'];
								$experiment=$_POST['experiment'];
								
								
								
								
								$con=mysqli_connect("localhost", "root", "","Elogbook")or die("cannot connect");
								
								if (mysqli_connect_errno())
								{
									echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
								$qry= "SELECT * FROM Session";
								$result=mysqli_query($con,$qry);
								
								if (!($result)) 
								{
									$_SESSION['Session.Error']=" Could not create a session. Try again ";
									header('Location: host_session.php');
								}
								else
								{	$b=0;
									
									$v=0;
									while ($row=mysqli_fetch_array($result))
									{	$v=(int)$row['sid'];
											
										if($v>$b)
										{	$b=$v;
											
										}
									}
									$sid=$b;
									
									$sid=$sid+1;
									
								}
								$qry= "INSERT INTO Session (sid, sem, sub ,log_in ,batch ,lab_no ,activity,experiment) VALUES ( '$sid','$semester' ,'$sub', now() , '$batch' , '$lab_no', '1','$experiment')";
								$result=mysqli_query($con,$qry);
								if (!($result)) 
								{	
								
									$_SESSION['Session.Error']=" Could not create a new session. Already exists. Approve to end session and create new one ";
									header('Location: host_session.php');
								}
								else
								{	$_SESSION['host_success_sid']=$sid;
									
									
										header('Location: host_success.php');
								
								}
								?>
							
