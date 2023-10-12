<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
$query = mysqli_query($con, "SELECT * FROM tblloststolenlist ORDER BY id DESC"); 
?>
<html>
<title>CRLPDRS Lost & Stolen Vehicle List</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<body>
	<center>
<h1>Car Registered License Plate Detection and Recognition System</h1>
<h2>Lost & Stolen Vehicle List</h2>
	<table width='80%' border=1>

	<tr bgcolor='#CCCCCC'>
		<th>Plate Numbers</th>
	</tr>
	<?php 
	while($result = mysqli_fetch_array($query)) { 		
		echo "<tr>";
		echo "<td>".$result['platenum']."</td>";
	}
	?>
	</table>
	</center>
</body>
</html>