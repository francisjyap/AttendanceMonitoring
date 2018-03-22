<?php 
session_start();
require 'DB.php';

if(isset($_POST['type']) && $_POST['type'] === "ADD"){
	addEmployee();
}

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

function addEmployee()
{		
	global $DB;

	$query = "INSERT INTO `employees` (`id_number`, `fname`, `mname`, `lname`) VALUES ('".$_POST['id_number']."', '".$_POST['fname']."', '".$_POST['mname']."','".$_POST['lname']."')";

	echo $query;

	if($DB->query($query) === true){
		echo "!Employee created";
		header("Location: ../AddEmployee.php?newcreate");
		die();
	} else {
		echo "! Failed";
		header("Location: ../AddEmployee.php?fail");
		die();
	}
}

function getBenefits($emp_id)
{
	global $DB;

	$query = "SELECT * FROM `benefits` WHERE `emp_id` = ".$emp_id."; ";

	return $DB->query($query);
}

function getDeductions($emp_id)
{
	global $DB;

	$query = "SELECT * FROM `deductions` WHERE `emp_id` = ".$emp_id."; ";

	return $DB->query($query);
}
	

?>