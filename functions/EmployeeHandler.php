<?php 
session_start();
require 'DB.php';

function getEmployees()
{
	global $DB;

	$query = "SELECT * FROM `employees`";

	return $DB->query($query);
}

?>