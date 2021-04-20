<?php
include 'config.php';
session_start();
error_reporting(0);

if (isset($_SESSION['username'])) {
	header('location: index.php');
}  

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT *FROM users WHERE email = '$email' ";
		$result = mysqli_query($conn, $sql);
		if(!$result -> num_rows > 0){
			$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if (result) {
				echo "<script>alert('USER REGISTRATION CONFIRMED.')</script>";
				$username = "";
				$email = "";
				$_POST['password']="";
				$_POST['cpassword']="";
			}else {
				echo "<script>alert('SOMETHING WENT WRONG.')</script>";
			}
		}else {
			echo "<script>alert('EMAIL ALREADY EXISTS.')</script>";
		}
	}else {
		echo "<script>alert('PASSWORDS DO NOT MATCH.')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Register</title>
</head>
<body>
	<div class="header">
		<h1>Register</h1>
		<form  action="" method="POST" class="login-email">
			 <div class="input-group">
			 	<label>username</label>
			      <input type="text" name="username">
		    </div>
		    <div class="input-group">
		    	<label>Email</label>
			      <input type="email" name="email">
		    </div>
		    <div class="input-group">
		    	<label>password</label>
			      <input type="password" name="password">
		    </div>
		    <div class="input-group">
		    	<label>confirm password</label>
			      <input type="password" name="cpassword">
		    </div>
		    <div class="input-group">
			    <button name="submit" class="btn">Register</button>
		    </div>
		     <p class="login-register-text">Already a member?<a href="index.php">Login now</a>.</p>
		 </form>
	</div>

</body>
</html> 