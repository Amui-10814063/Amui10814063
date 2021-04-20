<?php
include 'config.php';
session_start();
error_reporting(0);

if(isset($_SESSION['submit'])) {
	header('location: welcome.php');
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password' ";
	if($result -> num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] =$row['username'];
		header('location:welcome.php');
	} else {
		echo "<script>alert('PASSWORD OR EMAIL IS WRONG.')</script>";
	}
} 
?>
<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="style.css">
	<title>login</title>
</head>
<body>
	<div class="header">
		<h1>Login</h1>
		<form  action="welcome.php" method="POST" class="login-email">
		    <div class="input-group">
		    	<label>username</label>
			     <input type="text" name="username">
		    <div class="input-group">
		    	<label>Email</label>
			     <input type="text" name="email">
		    </div>
		    <div class="input-group">
		    	<label>password</label>
			    <input type="password" name="password">
		    </div>
		    <div class="input-group">
			    <button name="submit" class="btn">Login</button>
		    </div>
		     <p class="login-register-text">Dont have an account?<a href="register.php">Register now</a>.</p>
		 </form>
	</div>
</body>
</html>
?>