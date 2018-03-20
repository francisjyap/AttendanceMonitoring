<?php 

session_start();
require 'DB.php';

echo "TYPE = " .$_POST['type'];

if(isset($_POST['type']) && $_POST['type'] === "IDLOGIN"){
	echo "!IDLOGIN";

	$query = "SELECT * FROM `user` WHERE `id_number` = " .$_POST['id_number'];

	if($DB->query($query)->num_rows == 1){
		$_SESSION['IDLOGIN'] = true;
		$_SESSION['id_number'] = $_POST['id_number'];
		header("Location: ../Login.php");
		die();
	} else {
		header("Location: ../idLogin.php?fail");
		die();
	}
}

if(isset($_POST['type']) && $_POST['type'] === "LOGIN"){
	echo "!LOGIN";

	$query = "SELECT * FROM `user` WHERE `username` = '".$_POST['username']."' AND `id_number` = '".$_SESSION['id_number']."';";
	echo $query;

	$result = $DB->query($query);

	if($result->num_rows == 1){
		$row = $result->fetch_assoc();
		echo $row['password'];
		if(password_verify($_POST['password'], $row['password'])){
			echo "logged in";
			$_SESSION['LOGIN'] = true;
			$_SESSION['username'] = $_POST['username'];
			header("Location: ../Home.php");
			die();
		} else {
			echo "failed login";
			header("Location: ../Login.php?fail");
			die();
		}
	} else {
		header("Location: ../Login.php?fail");
		die();
	}
}

if(isset($_POST['type']) && $_POST['type'] === "SIGNUP"){
	
	$query = "INSERT INTO `user`(`id_number`, `username`, `password`) VALUES ('".$_POST['id_number']."', '".$_POST['username']."', '".password_hash($_POST['password'], PASSWORD_DEFAULT)."')";

	echo $query;

	if($DB->query($query) === true){
		echo "!user created";
		header("Location: ../idLogin.php?newcreate");
		die();
	} else {
		echo "!user failed";
		header("Location: ../Signup.php?fail");
		die();
	}
}

if(isset($_GET['logout'])){
	session_destroy();
	header("Location: ../idLogin.php");
	die();
}

?>