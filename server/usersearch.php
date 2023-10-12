<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);


$email = $_GET['email'];

$sql = mysqli_query($con, "SELECT * FROM tblcrlpdrsusers WHERE email='$email'");

while($res = mysqli_fetch_array($sql))
{
	$image = $res['image'];
	$licensenum = $res['licensenum'];
	$fname = $res['fname'];
	$mname = $res['mname'];
	$lname = $res['lname'];
	$issdate = $res['issuedate'];
	$expdate = $res['expirydate'];
}

?>
<html>
<head>	
	<title>CRLPDRS Scan Result</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>

<body>
	
	<form name="formedit" method="post" action="emailsearch.php" enctype="multipart/form-data">
		<table border="0"> 
				<tr>
				<td colspan="2"><img src="<?php echo $image ?>" id="img"></td>
				</tr>
				<tr> 
				<td><input type="hidden" name="email" value=<?php echo $_GET['email'];?>></td>
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
			</table>
	</form>
</body>
</html>
 