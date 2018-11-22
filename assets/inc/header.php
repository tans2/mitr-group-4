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
// echo "Connected successfully";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home</title>
    <link type="text/css" rel="stylesheet" href="indexStylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">
            <img src="airforcelogo.png" width="60" height="50" class="d-inline-block align-center" alt="">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="attendance.php">Attendance</a>
              <a class="dropdown-item" href="announcements.php">Announcements</a>
                <a class="dropdown-item" href="directory.php">Cadet Directory</a>
              <a class="dropdown-item" href="https://rpi.account.box.com/login">Media/Documents</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="home.php">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
