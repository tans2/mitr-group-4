<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "mitr";
// Create connection
$mysqli = mysqli_connect($host, $user, $password, $database);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>