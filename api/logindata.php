<?php 
include("dbcon.php");?>
<?php
$username = $_POST["username"];
$pass     = md5($_POST["password"]);
$respnse  =array();

 $data = $conn->query("select * from login where username='$username' and password='$pass'");
 if ($data->num_rows>0) {
 while($d  = $data->fetch_array(MYSQLI_ASSOC)){
 	$id = $d["id"];
 	$role = $d["role"];
 	$respnse["uid"] =$id;
 	$respnse["role"]=$role;
 	$respnse["message"]="login succes";
 }
 }
 else
 {
 	$respnse["message"]="Invalid login";
 	$respnse["status"]="1";
 }
 echo json_encode($respnse);

?>