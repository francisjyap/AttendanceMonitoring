<?php 
require 'functions/EmployeeHandler.php';

if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] === false) {
	header("Location: idLogin.php");
	die();
}

include 'layout/top.php'; 

?>

<div class="row rowForm">
	<div class="col-md-8 col-md-offset-2">
		<a href="Employees.php">Back to employee list</a>
		<h1>Attendance</h1>
		<h2><?php
			$row = getEmployee($_GET['emp_id']);
			echo "Employee: ".$row['fname']." ".$row['mname']." ".$row['lname'];
		?></h2>

		<table class="table">
			<tbody>
				<tr>
					<td><h4>Salary</h4></td>
					<td>
						<a href=<?php echo "Salary.php?emp_id=".$_GET['emp_id'] ?> class="btn btn-success">View</a>
					</td>
				</tr>

				<tr>
					<td><h4>Benefits</h4></td>
					<td>
						<a href=<?php echo "Benefits.php?emp_id=".$_GET['emp_id'] ?> class="btn btn-success">View</a>
					</td>
				</tr>

				<tr>
					<td><h4>Deductions</h4></td>
					<td>
						<a href=<?php echo "Deductions.php?emp_id=".$_GET['emp_id'] ?> class="btn btn-success">View</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<a href="" class="btn btn-success" style="float: right;">Time In/Out</a>
		<table class="table">
			<thead>
				<tr>
					<th>Time In</th>
					<th>Time Out</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$result = getAttendance($_GET['emp_id']);
					while($row = $result->fetch_assoc()){
						echo "
							<tr>
								<td> ".$row['time_in']." </td>
								<td> ".$row['time_out']." </td>
								<td>
									<a href='EditAttendance.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>
									<a href='functions/AttendanceHandler.php?delete?id=".$row['id']."' class='btn btn-danger'>Delete</a>
								</td>
							</tr>
						";
					}
				?>
			</tbody>
		</table>
	</div>
</div>


<?php include 'layout/bottom.php'; ?>
