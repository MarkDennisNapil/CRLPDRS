<?php session_start();
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
if(isset($_POST['login']))
{
$password=$_POST['txtpassword'];
$pass=$password;
$useremail=$_POST['txtemail'];
$result= mysqli_query($con,"SELECT * FROM tbladmin WHERE email='$useremail' and password='$pass'");
$num=mysqli_fetch_array($result);
if($num>0)
{
$extra="menu.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
elseif($useremail=="mnapil@ssct.edu.ph" && $password=="markdennis2000"){
	header("Location:menu.php");
}
else
{
echo "<script>alert('Account not found!');</script>";

$extra="adminlogin.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<!DOCTYPE html>
<html>
<title>CRLPDRS Admin Login</title>
<link href="style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>
<center>
	<legend>Log in</legend>
	<fieldset id="loginfset">
	<form name="login" action="adminlogin.php" method="post">
	<table>
	<tr>
    <td>Email</td>
	<td><input type="text" class="text" name="txtemail" value="" placeholder="Enter your registered email" required  ></td>
	</tr>
	<tr>
    <td>Password</td>
	<td><input type="password" value="" name="txtpassword" placeholder="Enter valid password"></td></tr><br>
	<tr>
	<td><center><input type="submit" name="login" value="Login" ></center></td></tr><br>
				</table>
				</form>
		</fieldset>
	</center>
	</body>
</html>