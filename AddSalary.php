<?php 


include 'layout/top.php';
?>

<div class="row rowForm">
	<form method="POST" action="functions/LoginHandler.php">
		<input type="hidden" name="type" value="SIGNUP">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<a href="Salary.php">Back to Salary List</a>
				<h1>Add Salary</h1>
			</div>

			<div class="form-group">
				<label>ID #</label>
				<input type="number" class="form-control" name="id_number" id="id_number">
			</div>

			<div class="form-group">
				<label>Employee ID</label>
				<input type="text" class="form-control" name="emp_id" id="emp_id">
			</div>

			<div class="form-group">
				<label>Name</label>
				<input type="text" class="form-control" name="bname" id="bname">
			</div>

			<div class="form-group">
				<label>Price</label>
				<input type="number" class="form-control" name="price" id="price">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success" style="float: right;">Add</button>
			</div>
		</div>
	</form>
</div>

<?php include 'layout/bottom.php'; ?>