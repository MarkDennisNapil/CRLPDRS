<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'CRLPDRSuserdb');
$sql="select * from tblcrlpdrsusers;";
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
/*if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 } */

$result=mysqli_query($con,$sql);
$response=array();

while($row=mysqli-fetch_array($result)){
	
	array_push($response,array("vimage"=>$row[0],"platenum"=>$row[1],"licensenum"=>$row[2],"issuedate"=>$row[3],"expirydate"=>$row[4],"lname"=>$row[5],"fname"=>$row[6],"mname"=>$row[7],"phonenum"=>$row[8],"email"=>$row[9],"password"=>$row[10],"vbrand"=>$row[11],"vmodel"=>$row[12],"street"=>$row[13],"purok"=>$row[14],"barangay"=>$row[15],"municipality"=>$row[16],"city"=>$row[17]
	}
?>
