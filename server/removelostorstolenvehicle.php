<?php
$host="localhost";
$user="root";
$password="";
$db="CRLPDRSuserdb";
$con=mysqli_connect($host,$user,$password,$db);
$id = $_GET['id'];

$tblresult = mysqli_query($con, "DELETE FROM tblloststolenlist WHERE id=$id");

header("Location:adminloststolenvehiclelist.php");
?>