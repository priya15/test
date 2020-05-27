<?php 
include("dbcon.php");
$uid = $_POST["uid"];
$did = $_POST["did"];
$data = $conn->query("select * from login where id='$uid' and role='1'");
 if ($data->num_rows>0) {
 $del = $conn->query("delete from login where id='$did'");
 if ($del>0) {
 	$response["message"] = "data delete success"
 }
 else
 {
 	$response["error"]="id not found";
 }
 else
 {
 	$response["message"] = "You have not permission for delete";
 }
 }