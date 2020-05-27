<?php
include("dbcon.php");
$response = array();
?>
<?php if(isset($_POST["uid"])==true) { ?>
<?php if($_POST["role"] == 1){?>
		<?php
		$uid   = $_POST["uid"];
		 $data = $conn->query("select * from login where role!=1 and uid='$uid'");
 if ($data->num_rows>0) {
 	$response["data"] = $data->fetch_array(MYSQLI_ASSOC);
    $response["message"] = "Userlist";
 }
 else
 {
    $response["message"] = "No Userlist found";
 }
?>

<?php }?>
<?php if($_POST["role"] == 0){?>

<?PHP    $response["message"] = "Welcome to dash
";?>
<?php }?>
<?php }?>

