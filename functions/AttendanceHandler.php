<?php 
// session_start();
require 'DB.php';
require 'EmployeeHandler.php';

if(isset($_POST['type']) && $_POST['type'] === "ADD_ATT"){
	createAttendance($_POST['emp_id']);
}
if(isset($_GET['delete_att']) && isset($_GET['id'])){
	deleteAttendance($_GET['id']);
}

function createAttendance($emp_id)
{
	global $DB;

	// echo $_POST['time_out'];

	$time_in = $_POST['time_in'];
	$time_in_hour = strtok($time_in, ":");
	$time_in_min = strtok(":");	

	$time_out = $_POST['time_out'];
	$time_out_hour = strtok($time_out, ":");
	$time_out_min = strtok(":");

	$total_hour = $time_out_hour - $time_in_hour;
	$total_min = $time_in_min + $time_out_min;
	$total_min /= 60;

	$total_time = $total_hour + $total_min;

	$emp = getEmployee($emp_id);

	$salary = $emp['salary'];

	$total_salary = $total_time * $salary;

	$query = "INSERT INTO `attendance`(`emp_id`, `time_in`, `time_out`, `total_salary`) VALUES ('".$emp_id."', '".$_POST['time_in']."', '".$_POST['time_out']."', '".$total_salary."')";

	if($DB->query($query)) {
		header("Location: ../ViewEmployee.php?success&emp_id=" . $emp_id);
		die();
	} else {
		header("Location: ../ViewEmployee.php?fail&emp_id=" . $emp_id);
		die();
	}
}

function deleteAttendance($id)
{
	globals $DB;

	$query = "DELETE FROM `attendance` WHERE `id` = '".$id."'";

	$DB->query($query);
}

?>