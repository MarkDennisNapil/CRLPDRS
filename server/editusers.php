<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['edit']))
{	
$id = mysqli_real_escape_string($con, $_POST['id']);
	$image = mysqli_real_escape_string($con, $_POST['image']);
	$vcategory = mysqli_real_escape_string($con, $_POST['vcategory']);
	$platenum = mysqli_real_escape_string($con, $_POST['platenum']);
	$licensenum = mysqli_real_escape_string($con, $_POST['licensenum']);
	$issdate = mysqli_real_escape_string($con, $_POST['issuedate']);
	$expdate = mysqli_real_escape_string($con, $_POST['expirydate']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$mname = mysqli_real_escape_string($con, $_POST['mname']);
	$sex = mysqli_real_escape_string($con, $_POST['sex']);
	$phonenum = mysqli_real_escape_string($con, $_POST['phonenum']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$vbrand = mysqli_real_escape_string($con, $_POST['vbrand']);
	$vmodel = mysqli_real_escape_string($con, $_POST['vmodel']);
	$address = mysqli_real_escape_string($con, $_POST['address']);

$filename = $_FILES["image"]["name"];
    $target_dir = 'images/'.$filename;
	$target_file = $target_dir . basename($_FILES['image']['name']);
	move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
		$sql = mysqli_query($con, "UPDATE tblcrlpdrsusers SET image='$target_file',vcategory='$vcategory',platenum='$platenum',licensenum='$licensenum',issuedate='$issdate',expirydate='$expdate',lname='$lname',fname='$fname',mname='$mname',sex='$sex', phonenum='$phonenum',address='$address',email='$email',password='$password',vbrand='$vbrand',vmodel='$vmodel' WHERE  id=$id");
		
	if($sql)
    {
    	echo '<script type="text/javascript"> alert("Successfully Edit User Account!"); </script>';  
    	header("Location:usermanagement.php");
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Editting Account!"); </script>';  
    }
}

$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM tblcrlpdrsusers WHERE id=$id");

while($res = mysqli_fetch_array($sql))
{
	$image = $res['image'];
	$vcategory = $res['vcategory'];
	$platenum = $res['platenum'];
	$licensenum = $res['licensenum'];
	$issdate = $res['issuedate'];
	$expdate = $res['expirydate'];
	$lname = $res['lname'];
	$fname = $res['fname'];
	$mname = $res['mname'];
	$sex = $res['sex'];
	$phonenum = $res['phonenum'];
	$email = $res['email'];
	$password = $res['password'];
	$vbrand = $res['vbrand'];
	$vmodel = $res['vmodel'];
	$address = $res['address'];
}

?>
<html>
<head>	
	<title>CRLPDRS Edit Users</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>

<body>
<h1>Edit User and Car or Vehicle Information</h1>
	
	<form name="formedit" method="post" action="editusers.php" enctype="multipart/form-data">
		<table border="0"> 
				<tr>
				<td colspan="2"><img src="<?php echo $image ?>" id="img"></td>
				</tr>
				<tr> 
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
			</tr>
				<tr>
				<td>Edit Vehicle Image:</td>
				<td><input type="file" name="image" value="<?php echo $image;?>"></td>
			</tr>
			<tr> 
				<td>Vehicle Category:</td>
				<td><input type="text" name="vcategory" value="<?php echo $vcategory;?>"></td>
			</tr>
			<tr> 
				<td>Plate Number:</td>
				<td><input type="text" name="platenum" value="<?php echo $platenum;?>"></td>
			</tr>
			<tr> 
				<td>License Number:</td>
				<td><input type="text" name="licensenum" value="<?php echo $licensenum;?>"></td>
			</tr>
			<tr> 
				<td>Issue Date:</td>
				<td><input type="date" name="issuedate" value="<?php echo $issdate;?>"></td>
			</tr>
			<tr> 
				<td>Expiry Date:</td>
				<td><input type="date" name="expirydate" value="<?php echo $expdate;?>"></td>
			</tr>
			<tr> 
				<td>Last Name:</td>
				<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
			</tr>
			<tr> 
				<td>First Name:</td>
				<td><input type="text" name="fname" value="<?php echo $fname;?>"></td>
			</tr>
			<tr> 
				<td>Middle Name:</td>
				<td><input type="text" name="mname" value="<?php echo $mname;?>"></td>
			</tr>
			<tr> 
				<td>Sex:</td>
				<td><input type="text" name="sex" value="<?php echo $sex;?>"></td>
			</tr>
			<tr><td rowspan="2">Edit Sex:</td>  
<td><input type="radio" name="sex" value="Male"/>Male</td>  
<tr>  
<td><input type="radio" name="sex" value="Female"/>Female</td></tr>  
</tr>  
			<tr> 
				<td>Phone Number:</td>
				<td><input type="text" name="phonenum" value="<?php echo $phonenum;?>"></td>
			</tr>
			<tr> 
				<td>Email:</td>
				<td><input type="text" name="email" value="<?php echo $email;?>"></td>
			</tr>
			<tr> 
				<td>Password:</td>
				<td><input type="text" name="password" value="<?php echo $password;?>"></td>
			</tr>
			<tr> 
				<td>Vehicle Brand:</td>
				<td><input type="text" name="vbrand" value="<?php echo $vbrand;?>"></td>
			</tr>
			<tr> 
				<td>Vehicle Model:</td>
				<td><input type="text" name="vmodel" value="<?php echo $vmodel;?>"></td>
			</tr>
			<tr> 
				<td>Address (Street/Purok/Barangay/Municipality/City/Province):</td>
				<td><input type="text" name="address" value="<?php echo $address;?>"></td>
			</tr>
		</table>
		<button name="edit" id="btnedit">Save Changes</button>
		
	</form>
</body>
</html>
 