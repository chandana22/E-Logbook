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
$query = "SELECT count(*) from student";
$s = mysqli_query($con,$query);
$row = mysqli_fetch_array($s);
if ($row['count(*)']==0)
   die("error");

	$query = "Select count(*) from student where sem=1";
	$s = mysqli_query($con,$query);
	$row=mysqli_fetch_array($s);
	$a1=$row['count(*)']; 

	$query = "Select count(*) from student where sem=3";
$s = mysqli_query($con,$query);
	$row=mysqli_fetch_array($s);
	$a2=$row['count(*)']; 
	$query = "Select count(*) from student where sem=5";
$s = mysqli_query($con,$query);
	$row=mysqli_fetch_array($s);
	$a3=$row['count(*)']; 
		$query = "Select count(*) from student where sem=7";
$s = mysqli_query($con,$query);
	$row=mysqli_fetch_array($s);
	$a4=$row['count(*)'];
	
	$val = array($a1,$a2,$a3,$a4);
	$grade=array("Sem1","Sem3","Sem5","Sem7");
	/* CAT:Bar Chart */

	/* pChart library inclusions */
	include("pChart2.1.3/class/pData.class.php");
	include("pChart2.1.3/class/pDraw.class.php");
	include("pChart2.1.3/class/pImage.class.php");

	/* Create and populate the pData object */
	$MyData = new pData();  
	$MyData->addPoints($val,"Answers");
	$MyData->setAxisName(0,"Number of Students");
	$MyData->addPoints($grade,"Options");
	$MyData->setAbscissa("Options");
	/* Create the pChart object */
	$myPicture = new pImage(1000,620,$MyData);

	/* Write the chart title */ 
	$myPicture->setFontProperties(array("FontName"=>"pChart2.1.3/fonts/calibri.ttf","FontSize"=>15));
	$myPicture->drawText(375,34,"Semester wise attendance details",array("FontSize"=>20));
	
	/* Define the default font */ 
	$myPicture->setFontProperties(array("FontName"=>"pChart2.1.3/fonts/calibri.ttf","FontSize"=>14));

	/* Set the graph area */ 
	$myPicture->setGraphArea(100,100,980,600);
	$myPicture->drawGradientArea(100,100,980,600,DIRECTION_HORIZONTAL,array("StartR"=>200,"StartG"=>200,"StartB"=>200,"EndR"=>240,"EndG"=>240,"EndB"=>240,"Alpha"=>30));

	/* Draw the chart scale */ 
	$scaleSettings = array("DrawXLines"=>TRUE, "Factors"=>array(2) , "Mode"=>SCALE_MODE_START0,"GridR"=>0,"GridG"=>0,"GridB"=>0,"GridAlpha"=>10,"Pos"=>SCALE_POS_TOPBOTTOM);
	$myPicture->drawScale($scaleSettings); 

	/* Turn on shadow computing */ 
	$myPicture->setShadow(TRUE,array("X"=>1,"Y"=>1,"R"=>0,"G"=>0,"B"=>0,"Alpha"=>10));

	/* Draw the chart */ 
	$myPicture->drawBarChart(array("Rounded"=>TRUE,"Surrounding"=>30));
	//pChart2.1.3/examples/pictures/example.drawBarChart.poll.png
	/* Render the picture (choose the best way) */
	$myPicture->autoOutput("pChart2.1.3/examples/pictures/example.drawBarChart.poll.png");


?>
