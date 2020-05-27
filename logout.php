<?php
session_start();
if(isset($_SESSION["uid"])==true) {
	echo "DFd";
session_destroy();
header("location:login.php");
}