<?php

$server = "localhost:3307";
$user = "root";
$password = "";
$database = "projectlogin2";

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn){
	die("<script>alert('Connection Failed.')</script>");
}
?>