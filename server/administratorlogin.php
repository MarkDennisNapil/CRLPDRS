<?php
$host="localhost";
$user="root";
$pasword="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
$email=$_GET["email"];
$password=$_GET["password"];
$sql="select id from tbladmin where email='$email' password='$password';
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)<1){
	$status="failed";
	echo json_encode(array("response"=>$status));
	}
	else{
		$row=mysqli_fetch_assoc($result);
		$name=$row['name'];
		$status="ok";
		echo
		json_encode(array("email"=>$email,"name"=>$name));
		}
		mysqli_close($con);
?>