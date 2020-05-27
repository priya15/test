<?php include("header.php");
include("dbcon.php");
?>
<?php if(isset($_SESSION["uid"])==true) { ?>
<?php if($_SESSION["role"] == 1){?>
<div class="container">
	<div class="col-md-12">
		<table class="table table-bordered"><thead><tr><th>Username</th></tr></thead><tbody>
		<?php
		 $data = $conn->query("select * from login where role!=1");
 if ($data->num_rows>0) {
 while($d  = $data->fetch_array(MYSQLI_ASSOC)){
 	$username = $d["username"];
 	$password = $d["password"];
 	echo "<tr><td>$username</td></tr>";
 }
 }
 else
 {
 	echo "<tr><td>no data found</td></tr>";
 }
?>
</tbody>
</table>
	</div>

</div>
<?php }?>
<?php if($_SESSION["role"] == 0){?>

Welcome to dash
<?php }?>
<?php }?>
<?php if (isset($_SESSION["uid"])==false) { ?>
	<?php header("location:index.php");?>
<?php } ?>

