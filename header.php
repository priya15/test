<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>

</head>
<body>
	<?php session_start();?>
	<?php if(isset($_SESSION["uid"])==true) { ?>
	 <a href="dash.php">Dash</a>
	 <a href="logout.php">Logout</a>
	<?php } ?>
	<?php if(isset($_SESSION["uid"])==false) { ?>
	 <a href="login.php">Login</a>
	<?php } ?>