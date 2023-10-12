<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
$query = mysqli_query($con, "SELECT * FROM tbladmin ORDER BY id DESC"); 
?>
<html>
<title>CRLPDRS Administrator Management</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<body>
	<center>
<h1>Car Registered License Plate Detection and Recognition System</h1>
<h2>Administrator Account Management</h2>
	<table width='80%' border=1>

	<tr bgcolor='#CCCCCC'>
		<th>First Name</th>
		<th>Middle Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Address</th>
		<th>Action</th>
	</tr>
	<?php 
	while($result = mysqli_fetch_array($query)) { 		
		echo "<tr>";
		echo "<td>".$result['fname']."</td>";
		echo "<td>".$result['mname']."</td>";
		echo "<td>".$result['lname']."</td>";
		echo "<td>".$result['email']."</td>";
		echo "<td>".$result['password']."</td>";
		echo "<td>".$result['address']."</td>";
		echo "<td><a href=\"editadmin.php?id=$result[id]\">Edit</a>|<a href=\"removeadmin.php?id=$result[id]\" onClick=\"return confirm('Are you sure you want to remove this user?')\">Remove</a></td>";
	}
	?>
	</table>
	</center>
</body>
</html>