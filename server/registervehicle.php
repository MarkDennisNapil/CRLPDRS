<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['register']))
{
	 $filename = $_FILES["image"]["name"];
    $target_dir = 'images/'.$filename;
	$target_file = $target_dir . basename($_FILES['image']['name']);
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
	$vcategory=$_POST['vcategory'];
	$platenum=$_POST['platenum'];
	$licensenum=$_POST['licensenum'];
	$issdate=$_POST['issuedate'];
	$expdate=$_POST['expirydate'];
	$lname=$_POST['lname'];
	$fname=$_POST['fname'];
	$mname=$_POST['mname'];
	$sex=$_POST['sex'];
	$phonenum=$_POST['phonenum'];
	$regemail=$_POST['regemail'];
	$regpass=$_POST['regpass'];
	$vbrand=$_POST['vbrand'];
	$vmodel=$_POST['vmodel'];
	$address=$_POST['address'];
	$sql=mysqli_query($con,"INSERT INTO tblcrlpdrsusers (image,vcategory,platenum,licensenum,issuedate,expirydate,lname,fname,mname,sex,phonenum,address,email,password,vbrand,vmodel) VALUES ('$target_file','$vcategory','$platenum','$licensenum','$issdate','$expdate','$lname','$fname','$mname','$sex','$phonenum','$address','$regemail','$regpass','$vbrand','$vmodel')");
	

if($sql)
    {
    	echo '<script type="text/javascript"> alert("Successfully Registered to CRLPDRS!"); </script>';  
    	header("Location:registervehicle.php");
    }
    else
    {
	echo $con->error;    
	echo '<script type="text/javascript"> alert("Error Registration! Email may be duplicated!"); </script>'; 
    }
}

?>
<html>
<title>CRLPDRS Register</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<body>
	<center>
<h1>Car Registered License Plate Detection and Recognition System</h1>
<legend>Register New Vehicle</legend>
<fieldset>
<form name="register" method="post" enctype="multipart/form-data">
	<table>
	<tr>
		<td>Attach Vehicle Image:</td>
		<td><input type="file" name="image"></td>
	</tr>
	<tr> 
				<td>Vehicle Category:</td>
				<td><input type="text" name="vcategory" ></td>
			</tr>
	<tr>
		<td>Plate Number:</td>
		<td><input type="text" name="platenum"></td>
	</tr>
	<tr>
		<td>License Number:</td>
		<td><input type="text" name="licensenum"></td>
	</tr>
	<tr>
		<td>License Issue Date:</td>
		<td><input type="date" name="issuedate"></td>
	</tr>
	<tr>
		<td>License Expiry Date:</td>
		<td><input type="date" name="expirydate"></td>
	</tr>
	<tr>
		<td>Last Name:</td>
		<td><input type="text" name="lname"></td>
	</tr>
	<tr>
		<td>First Name:</td>
		<td><input type="text" name="fname"></td>
	</tr>
	<tr>
		<td>Middle Name:</td>
		<td><input type="text" name="mname"></td>
	</tr>
	<tr><td rowspan="2">Sex:</td>  
<td><input type="radio" name="sex" value="Male"/>Male</td>  
<tr>  
<td><input type="radio" name="sex" value="Female"/>Female</td></tr>  
</tr>  
	<tr>
		<td>Phone Number:</td>
		<td><input type="number" name="phonenum"></td>
	</tr>
	<tr>
		<td>Email:</td>
		<td><input type="email" name="regemail"></td>
	</tr>
	<tr>
		<td>Password:</td>
		<td><input type="password" name="regpass"></td>
	</tr>
	<tr>
		<td>Vehicle Brand:</td>
		<td><input type="text" name="vbrand"></td>
	</tr>
	<tr>
		<td>Vehicle Model:</td>
		<td><input type="text" name="vmodel"></td>
	</tr>
	<tr>
		<td>Address (Street/Purok/Barangay/Municipality/City/Province) :</td>
		<td><input type="text" name="address"></td>
	</tr>
	</table>
	<button name="register" id="btnregister" >Register</button>
</table>
</form>
</fieldset>
</center>
</body>
</html>