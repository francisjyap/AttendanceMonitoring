<?php 
session_start();
if($_SESSION['IDLOGIN'] == null){
	header("Location: idLogin.php?nologin");
}

if(isset($_SESSION['LOGIN']) && $_SESSION['LOGIN'] === true){
	header("Location: Home.php");
	die();
}
include 'layout/top.php'; 
?>

	<div class="row rowForm">
		<form method="POST" action="functions/LoginHandler.php">
			<input type="hidden" name="type" value="LOGIN">
			<div class="col-md-6 col-md-offset-3">
				<div class="form-group">
					<?php 
						if(isset($_GET['fail'])){
							echo "<h3 style='color: red;'>Incorrect Username or Password</h3>";
						}
					?>
					<h1>Login</h1>
				</div>

				<div class="form-group">
					<h4>Logged in as: <?php echo $_SESSION['id_number'] ?></h4>
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
					<a href="functions/LoginHandler.php?logout">Login as another user</a>
					<button type="submit" class="btn btn-success" style="float: right;">Login</button>
				</div>
			</div>
		</form>
	</div>

<?php include 'layout/bottom.php'; ?>