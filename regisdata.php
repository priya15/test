<?php 
include("dbcon.php");?>
<?php
$username = $_POST["username"];
$pass     = md5($_POST["password"]);
 $data = $conn->query("select * from login where username='$username' and password='$pass'");
 if ($data->num_rows>0) {
 
 	header("location:regis.php");
 
 }
 else
 {
 	$ins = $conn->query("insert into login values(NULL,'$username','$pass','0','0')");
 	if($ins>0){
 		 header("location:login.php");

 	}
 }

?>