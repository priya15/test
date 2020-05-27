<?php 
include("dbcon.php");?>
<?php
$username = $_POST["username"];
$pass     = md5($_POST["password"]);
$respnse =array();
 $data = $conn->query("select * from login where username='$username' and password='$pass'");
 if ($data->num_rows>0) {
   $respnse["message"] = "Username already exist";
   $respnse["status"]="0";

 }
 else
 {
 	$ins = $conn->query("insert into login values(NULL,'$username','$pass','0','0')");
 	if($ins>0){
     $respnse["message"] = "Username already exist";
     $respnse["status"]="0";
 	}
 }
 json_encode($respnse);

?>