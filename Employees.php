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
		<div class="form-group">
			<h2>List of Employees</h2>
			<a href="Home.php" class="btn btn-success">Home</a>
			<a href="functions/LoginHandler.php?logout" class="btn btn-danger" style="float: right;">Logout</a>
			<br>
			<br>
			<a href="AddEmployee.php" class="btn btn-primary" style="float: right;">Add New Employee</a>

		</div>

		<table class="table">
			<thead>
				<tr>
					<th>ID #</th>
					<th>Name</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$result = getEmployees();

					while($row = $result->fetch_assoc()) {
						echo "
							<tr>
								<td> ".$row['id_number']." </td>
								<td> ".$row['fname']." ".$row['mname']." ".$row['lname']." </td>
								<td> 
									<a href='ViewEmployee.php?emp_id=".$row['id']."' class='btn btn-primary'>View</a>
									<a href='functions/EmployeeHandler.php?delete_emp&id=".$row['id']."' class='btn btn-danger'>Delete</a>
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
