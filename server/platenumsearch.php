<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);


$platenum = $_GET['platenum'];

$sql = mysqli_query($con, "SELECT * FROM tblcrlpdrsusers WHERE platenum='$platenum'");

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
	<form name="formedit" method="post" action="platenumsearch.php" enctype="multipart/form-data">
		<table border="0"> 
				<tr>
				<td colspan="3"><img src="<?php echo $image ?>" id="img"></td>
				</tr>
				<tr> 
				<td colspan="3"><input type="hidden" name="platenum" value=<?php echo $_GET['platenum'];?>></td>
			</tr>
			<tr>
				<th colspan="3" style="color: white;">License Number:</th>
			</tr>
			<tr> 
				<td colspan="3"><?php echo $licensenum;?></td>
			</tr>
			<tr>
				<th colspan="3" style="color: white;">License Status</th>
				</tr>
				<tr>
				<th>Issue Date</th>
				<th>Expiry Date:</th>
				<th></th>
				</tr>
				<tr> 
				<td><?php echo $issdate;?></td> 
				<td><?php echo $expdate;?></td>
				<td></td>
			</tr>
			<tr>
				<th colspan="3" style="color: white;">Owner:</th>
			</tr>
			<tr> 
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
			</tr>
			<tr> 
				<td><?php echo $fname;?></td>
				<td><?php echo $mname;?></td>
	            <td><?php echo $lname;?></td>
			</tr>
			</table>
	</form>
	
</body>
</html>
 