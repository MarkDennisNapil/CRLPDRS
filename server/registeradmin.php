<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['register']))
{
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$address=$_POST['address'];
	$sql=mysqli_query($con,"INSERT INTO tbladmin (fname,mname,lname,email,password,address) VALUES ('$fname','$mname','$lname','$email','$password','$address')");
	

if($sql)
    {
    	echo '<script type="text/javascript"> alert("Successfully Registered to CRLPDRS!"); </script>';  
    	header("Location:menu.php");
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Registration!"); </script>';  
    }
}

?>
<html>
<title>CRLPDRS Administrator Registration</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<body>
	<center>
<h1>Car Registered License Plate Detection and Recognition System</h1>
<legend>Register or Add Administrator</legend>
<fieldset>
<form name="register" method="post" enctype="multipart/form-data">
	<table>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="fname"></td>
	</tr>
	<tr>
		<td>Middle Name:</td>
		<td><input type="text" name="mname"></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="lname"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="email"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="text" name="password"></td>
	</tr>
	<tr>
		<td>Address (Street/Purok/Barangay/Municipality/City/Province) :</td>
		<td><input type="text" name="address"></td>
	</tr>
	</table>
	<button name="register" id="btnregister" >Register</button>
	<button id="btncancel">Cancel</button>
<table>
</form>
</fieldset>
</center>
</body>
</html>