<?php 
session_start();
require 'DB.php';

function getEmployees()
{
	global $DB;

	$query = "SELECT * FROM `employees`";

	return $DB->query($query);
}

function getEmployee($emp_id)
{
	global $DB;

	$query = "SELECT * FROM `employees` WHERE `id` = ".$emp_id." ";

	return $DB->query($query)->fetch_assoc();
}

function getAttendance($emp_id)
{
	global $DB;

	$query = "SELECT * FROM `attendance` WHERE `emp_id` = ".$emp_id." ";

	return $DB->query($query);
}


?>