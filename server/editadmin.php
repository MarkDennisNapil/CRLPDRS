<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['edit']))
{	
$id = mysqli_real_escape_string($con, $_POST['id']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$mname = mysqli_real_escape_string($con, $_POST['mname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$address = mysqli_real_escape_string($con, $_POST['address']);

		$sql = mysqli_query($con, "UPDATE tbladmin SET fname='$fname',mname='$mname',lname='$lname',email='$email',password='$password',address='$address' WHERE  id=$id");
		
	if($sql)
    {
    	echo '<script type="text/javascript"> alert("Successfully Edit Administrator Account!"); </script>';  
    	header("Location:adminaccountmanagement.php");
    }
    else
    {
    	echo '<script type="text/javascript"> alert("Error Editing Account!"); </script>';  
    }
}

$id = $_GET['id'];

$sql = mysqli_query($con, "SELECT * FROM tbladmin WHERE id=$id");

while($res = mysqli_fetch_array($sql))
{
	$fname = $res['fname'];
	$mname = $res['mname'];
	$lname = $res['lname'];
	$email = $res['email'];
	$password = $res['password'];
	$address = $res['address'];
}

?>
<html>
<head>	
	<title>CRLPDRS Edit Administrator Account</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>

<body>
	
	<form name="formedit" method="post" action="editadmin.php" enctype="multipart/form-data">
		<table border="0">
				<tr> 
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
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
				<td>Last Name:</td>
				<td><input type="text" name="lname" value="<?php echo $lname;?>"></td>
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
				<td>Address (Street/Purok/Barangay/Municipality/City/Province):</td>
				<td><input type="text" name="address" value="<?php echo $address;?>"></td>
			</tr>
		</table>
		<button name="edit" id="btnedit">Save Changes</button>
		
	</form>
</body>
</html>
 