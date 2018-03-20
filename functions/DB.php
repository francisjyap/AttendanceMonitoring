<?php 
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "AttendanceMonitoring";

	// Create connection
	$DB = new mysqli($server, $user, $pass, $db);

	// Check connection
	if ($DB->connect_error) {
	    die("Connection failed: " . $DB->connect_error);
	} 
	//echo "Connected successfully";
?>