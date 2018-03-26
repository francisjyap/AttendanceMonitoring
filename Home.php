<?php 
session_start();

if(!isset($_SESSION['LOGIN']) || $_SESSION['LOGIN'] === false) {
	header("Location: idLogin.php");
	die();
}

include 'layout/top.php'; 

?>

<div class="row">
	<div class="col-md-4 col-md-offset-4" style="text-align: center; margin-top: 10%">
		<div class="form-group">
			<h4>Logged in as: <?php echo $_SESSION['id_number'] ?>
				<br>
				Welcome: <strong><?php echo $_SESSION['username'] ?></strong></h4>
		</div>

		<a href="Employees.php" class="btn btn-primary" style="width: 100%; margin-bottom: 20px;">Employees List</a>

		<div class="form-group">
			<a href="functions/LoginHandler.php?logout" class="btn btn-danger" style="width: 100%; margin-bottom: 20px;">Logout</a>
		</div>
	</div>
</div>

<?php include 'layout/bottom.php'; ?>
