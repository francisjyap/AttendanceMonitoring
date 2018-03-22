<?php 
require 'functions/EmployeeHandler.php';


include 'layout/top.php';
?>

<div class="row rowForm">
	<form method="POST" action="functions/EmployeeHandler.php">
		<input type="hidden" name="type" value="ADD">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<?php 
					if(isset($_GET['newcreate'])){
						echo "<h3 style='color: green;'>Employee successfully added!</h3>";
					}
					if(isset($_GET['fail'])){
						echo "<h3 style='color: red;'>Employee adding failed!</h3>";
					}
				?>

			</div>
			<div class="form-group">
				<a href="Employees.php">Back to employee list</a>
				<h1>Add Employee</h1>
			</div>

			<div class="form-group">
				<label>ID #</label>
				<input type="number" class="form-control" name="id_number" id="id_number">
			</div>

			<div class="form-group">
				<label>First Name</label>
				<input type="text" class="form-control" name="fname" id="fname">
			</div>

			<div class="form-group">
				<label>Middle Name</label>
				<input type="text" class="form-control" name="mname" id="mname">
			</div>

			<div class="form-group">
				<label>Last Name</label>
				<input type="text" class="form-control" name="lname" id="lname">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success" style="float: right;">Add</button>
			</div>
		</div>
	</form>
</div>

<?php include 'layout/bottom.php'; ?>