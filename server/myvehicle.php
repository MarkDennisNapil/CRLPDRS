<?php
$host="localhost";
$user="root";
$pasword="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
$email=$_GET["email"];
$password=$_GET["password"];
$sql="select id from tblcrlpdrsusers where email='$email' password='$password';
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)<1){
	$status="failed";
	echo json_encode(array("response"=>$status));
	}
	else{
		$row=mysqli_fetch_assoc($result);
		$name=$row['name'];
		$status="ok";
		echo
		json_encode(array("email"=>$email,"name"=>$name));
		}
		mysqli_close($con);
				$vimage=$row['vimage'];
				$platenum=$row['platenum'];
				$licensenum=$row['licensenum'];
				$issuedate=$row['issuedate'];
				$expirydate=$row['expirydate'];
				$lname=$row['lname'];
				$fname=$row['fname'];
				$mname=$row['mname'];
				$phonenum=$row['phonenum'];
				$address=$row['address'];
				$vbrand=$row['vbrand'];
				$vmodel=$row['vmodel'];
				?>
				<html>
				<head>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
				<body>
					<button><a href="homepage.php" style="text-align: left; color: orange;">Back</a></button>
				<center>
					<img src="<?php echo $image ?>" id="img">
					</center>
						<p>Plate Number:</p>
					<p id="platenum"><?php echo $platenum?></p>
						<p>License Number:</p>
					<p id="licensenum"><?php echo $licensenum?></p>
						<p>License Status</p>
						<p>Issue Date:</p>
					<p id="issuedate"><?php echo $issuedate?></p>
						<p>Expiry Date:</p>
					<p id="expirydate"><?php echo $expirydate?></p>
					<p>Owner</p>
					<p id="lname"><?php echo $lname?></p>
					<p id="fname"><?php echo $fname?></p>
					<p id="mname"><?php echo $mname?></p>
					<p id="phonenum"><?php echo $phonenum?></p>
					<p id="address"><?php echo $address?></p>
					<p id="vbrand"><?php echo $vbrand?></p>
					<p id="vmodel"><?php echo $vmodel
?></p>
				</body>
				</html>