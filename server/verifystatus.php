<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);


$platenum = $_GET['platenum'];

$sql = mysqli_query($con, "SELECT * FROM tblloststolenlist WHERE platenum='$platenum'");

while($res = mysqli_fetch_array($sql))
{
	
	$status = $res['status'];
	$contact = $res['contact'];
	

if($sql){
echo "";
}
else{
 echo "Verified Owner";
}
}
?>
<html>
<head>	
	<title>CRLPDRS Verify Scan Result</title>
	<link href="style.css" rel='stylesheet' type='text/css' />
</head>

<body>
	
	<form name="formedit" method="post" action="verifystatus.php" enctype="multipart/form-data">
		<table border="0"> 
				<tr> 
				<td><input type="hidden" name="platenum" value=<?php echo $_GET['platenum'];?>></td>
			</tr>
			<p id="verifymessage"><?php echo $status, $contact;?></p>
			</table>
	</form>
</body>
</html>
 