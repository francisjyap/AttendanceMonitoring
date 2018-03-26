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
			<input type="hidden" name="type" value="IDLOGIN">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<?php 
						if(isset($_GET['fail'])){
							echo "<h3 style='color: red;'>ID # Not Found!</h3>";
						}
						if(isset($_GET['nologin'])){
							echo "<h3 style='color: red;'>Not Logged In! Please Login first.</h3>";
						}
						if(isset($_GET['newcreate'])){
							echo "<h3 style='color: green;'>User Created! You can now login!</h3>";
						}
					?>
				</div>

				<div class="form-group">
					<label>ID #</label>
					<input type="number" class="form-control" name="id_number" id="id_number" autofocus="true" autocomplete="false">
				</div>
				
				<div class="form-group">
					<a href="Signup.php">Don't have an account?</a>
					<button type="submit" class="btn btn-success" style="float: right;">Login with ID #</button>
				</div>
			</div>
		</form>
	</div>

<?php include 'layout/bottom.php'; ?>