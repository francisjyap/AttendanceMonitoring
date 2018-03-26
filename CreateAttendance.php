<?php 
require 'functions/AttendanceHandler.php';

if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] === false) {
	header("Location: idLogin.php");
	die();
}

include 'layout/top.php'; 

?>
	<div class="row rowForm">
	<form method="POST" action="functions/AttendanceHandler.php">
		<input type="hidden" name="type" value="ADD_ATT">
		<input type="hidden" name="emp_id" value="<?php echo $_GET['emp_id'] ?>">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<a href=<?php echo "ViewEmployee.php?emp_id=".$_GET['emp_id'] ?> class="btn btn-danger">Back</a>
				<h1>Attendance</h1>
			</div>

			<div class="form-group">
				<label>Time In</label>
				<input type="time" class="form-control" name="time_in" id="time_in">
			</div>

			<div class="form-group">
				<label>Time Out</label>
				<input type="time" class="form-control" name="time_out" id="time_out">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success" style="float: right;">Add</button>
			</div>
		</div>
	</form>
</div>

<?php include 'layout/bottom.php'; ?>
