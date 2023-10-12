<?php 
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
$query = mysqli_query($con, "SELECT * FROM tblcrlpdrsusers ORDER BY issuedate DESC"); 
?>
<html>
<title>CRLPDRS User Management</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<body>
	<center>
<h1>Car Registered License Plate Detection and Recognition System</h1>
<h2>User Management</h2>
	<table width='80%' border=1>

	<tr bgcolor='#CCCCCC'>
		<th>Plate Number</th>
		<th>License Number</th>
		<th>Last Name</th>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Date Registered</th>
		<th>Action</th>
	</tr>
	<?php 
	while($result = mysqli_fetch_array($query)) { 		
		echo "<tr>";
		echo "<td>".$result['platenum']."</td>";
		echo "<td>".$result['licensenum']."</td>";
		echo "<td>".$result['lname']."</td>";
		echo "<td>".$result['fname']."</td>";
		echo "<td>".$result['mname']."</td>";
		echo "<td>".$result['issuedate']."</td>";
		echo "<td><a href=\"editusers.php?id=$result[id]\">Edit</a>|<a href=\"deleteusers.php?id=$result[id]\" onClick=\"return confirm('Are you sure you want to remove this user?')\">Delete</a></td>";
	}
	?>
	</table>
	</center>
</body>
</html>