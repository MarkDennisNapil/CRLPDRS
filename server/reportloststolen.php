<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);

if(isset($_POST['report']))
{
	 
	$platenum=$_POST['platenum'];
	$status=$_POST['status'];
	$contact=$_POST['contact'];
	
	$sql=mysqli_query($con,"INSERT INTO tblloststolenlist (platenum, status, contact) VALUES ('$platenum','$status','$contact')");
	

if($sql)
    {
    	echo "<p>Successfully Submitted Report!</p>";  
    	
    }
    else
    {
    	echo "<p>Error Reporting!</p>";  
    }
}

?>
<html>
<title>CRLPDRS Report Lost or Stolen</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<body>
	<center>
<h1>Car Registered License Plate Detection and Recognition System</h1>
<legend>Report Car Lost or Stolen</legend>
<fieldset>
<form name="report" method="post" enctype="multipart/form-data">
	<table>
	
	<tr>
		<td>Plate Number:</td>
		<td><input type="text" name="platenum"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="hidden" name="status" value="This Vehicle is Reported Lost or Stolen! Contact the Owner:"></td>
	</tr>
	<tr>
		<td>Contact:</td>
		<td><input type="text" name="contact"></td>
	</tr>
	</table>
	<button name="report" id="btnreport" >Report</button>
</form>
</fieldset>
</center>
</body>
</html>