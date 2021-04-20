<?php
session_start();
error_reporting(0);

if(isset($_SESSION['username'])) {
	header('location: index.php');
}  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>WELCOME</title>
</head>
<body>
	<?php echo "welcome" . $_SESSION['username'];  ?>
	<a href="logout.php">logout</a>

</body>
</html>