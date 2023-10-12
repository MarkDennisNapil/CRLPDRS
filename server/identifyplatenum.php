<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
$query = mysqli_query($con, "SELECT * FROM tblcrlpdrsusers"); 
?>
<html>
<title>CRLPDRS Identify Plate Number</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<body>
	<center>
<h1>Car Registered License Plate Detection and Recognition System</h1>
<h2>Identify Plate Number</h2>
	<table width='80%' border=1>

	<tr bgcolor='#CCCCCC'>
		<th>License Number</th>
		<th>Last Name</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Action</th>
	</tr>
	<?php 
	while($result = mysqli_fetch_array($query)) { 		
		echo "<tr>";
		echo "<td>".$result['licensenum']."</td>";
		echo "<td>".$result['lname']."</td>";
		echo "<td>".$result['fname']."</td>";
		echo "<td>".$result['mname']."</td>";
		echo "<td><a href=\"platenumsearch.php?platenum=$result[platenum]\">Get</a></td>";
	}
	?>
	</table>
	</center>
</body>
</html>