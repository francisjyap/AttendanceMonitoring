<?php 
require 'functions/AttendanceHandler.php';

if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] === false) {
	header("Location: idLogin.php");
	die();
}

include 'layout/top.php'; 

?>



<?php include 'layout/bottom.php'; ?>
