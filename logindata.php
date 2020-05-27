<?php 
session_start();
include("dbcon.php");?>
<?php
$username = $_POST["username"];
$pass     = md5($_POST["password"]);
 $data = $conn->query("select * from login where username='$username' and password='$pass'");
 if ($data->num_rows>0) {
 while($d  = $data->fetch_array(MYSQLI_ASSOC)){
 	$id = $d["id"];
 	$role = $d["role"];
 	$_SESSION["uid"] =$id;
 	$_SESSION["role"]=$role;
 	header("location:dash.php");
 }
 }
 else
 {
 	echo "error";
 }

?>