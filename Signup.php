<?php 
session_start();

if(isset($_SESSION['LOGIN']) && $_SESSION['LOGIN'] === true){
	header("Location: Home.php");
	die();
} else if(isset($_SESSION['IDLOGIN']) && $_SESSION['IDLOGIN'] === true){
	header("Location: Login.php");
	die();
}
include 'layout/top.php'; 
?>

<div class="row rowForm">
	<form method="POST" action="functions/LoginHandler.php">
		<input type="hidden" name="type" value="SIGNUP">
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group">
				<a href="idLogin.php">Back to Login</a>
				<h1>Signup</h1>
			</div>

			<div class="form-group">
				<label>ID #</label>
				<input type="number" class="form-control" name="id_number" id="id_number">
			</div>

			<div class="form-group">
				<label>Username</label>
				<input type="text" class="form-control" name="username" id="username">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" name="password" id="password">
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success" style="float: right;">Signup</button>
			</div>
		</div>
	</form>
</div>

<?php include 'layout/bottom.php'; ?>