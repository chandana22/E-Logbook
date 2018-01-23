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


						
							$usn=$_POST['USN'];
							echo $usn;
							$qry= "SELECT * FROM student WHERE USN='$usn'";
							$result=mysqli_query($con,$qry);

							if($result) {
							if(mysqli_num_rows($result) <= 0) {
								echo "<p> No student details found. Please contact your admin.</p>"; 
							}
							else {	
							echo "<div class='ui basic each_student modal' >";
								echo " <table class='ui left aligned inverted five column celled table segment'><thead><tr><th class='ten wide'>Particular</th><th class='ten wide'>Details</th><th class='three wide'>Update</th></tr></thead><tbody>";
								while ($row=mysqli_fetch_array($result))
								{	echo "<tr><td>";
									echo 'Name';
									echo "</td><td>";
									echo $row['name'];
									echo "</td><td>";
									echo "<i class='lock icon'></i>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'USN';
									echo "</td><td>";
									echo $row['USN'];
									echo "</td><td>";
									echo "<i class='lock icon'></i>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Semester';
									echo "</td><td>";
									echo $row['sem'];
									echo "</td><td>";
									echo "<i class='lock icon'></i>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Batch';
									echo "</td><td>";
									echo $row['batch'];
									echo "</td><td>";
									echo "<i class='lock icon'></i>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Email id';
									echo "</td><td>";
									echo $row['mail_id'];
									echo "</td><td>";
									echo "<a href='student_update.php'><i class='edit icon'></i></a>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Phone number';
									echo "</td><td>";
									echo $row['phone'];
									echo "</td><td>";
									echo "<a href='student_update.php'><i class='edit icon'></i></a>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo "Parent's name";
									echo "</td><td>";
									echo $row['patent'];
									echo "</td><td>";
									echo "<i class='lock icon'></i>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Parent mail id';
									echo "</td><td>";
									echo $row['parent_mail_id'];
									echo "</td><td>";
									echo "<a href='student_update.php'><i class='edit icon'></i></a>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Parent number';
									echo "</td><td>";
									echo $row['parent_no'];
									echo "</td><td>";
									echo "<a href='student_update.php'><i class='edit icon'></i></a>";
									echo "</td></tr>";
									echo "<tr><td>";
									echo 'Address';
									echo "</td><td>";
									echo $row['Address'];
									echo "</td><td>";
									echo "<a href='student_update.php'><i class='edit icon'></i></a>";
									echo "</td></tr>";
								
									
								}
								echo "</tbody></table>";
							}
							echo "</div>";
						}
						?>