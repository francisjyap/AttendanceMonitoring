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
			<h2>List of Deductions</h2>
			<a href=<?php echo "ViewEmployee.php?emp_id=".$_GET['emp_id'] ?> class="btn btn-danger">Back</a>
			<a href="AddDeductions.php" class="btn btn-success" style="float: right;">Add New Deduction</a>

		</div>

		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Price</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$result = getDeductions($_GET['emp_id']);

					while($row = $result->fetch_assoc()) {
						echo "
							<tr>
								<td> ".$row['name']." </td>
								<td> ".$row['price']." </td>
								<td> 
									<a href='EditDeductions.php?id=".$row['id']."' class='btn btn-primary'>Edit</a>
									<a href='functions/EmployeeHandler.php?deleteDeductions?id=".$row['id']."' class='btn btn-danger'>Delete</a>
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