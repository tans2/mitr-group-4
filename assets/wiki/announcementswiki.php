<?php
require_once('../inc/dbinfo.php');
session_start();
require_once('../objects/wiki.php');

$wiki = new wiki( "announcements", $mysqli );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Home</title>
	  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="home.php">
            <img src="../images/airforcelogo.png" width="60" height="50" class="d-inline-block align-center" alt="">
        </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../../home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../myprofile.php">Profile</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../../attendance.php">Attendance</a>
              <a class="dropdown-item" href="../../announcements.php">Announcements</a>
                <a class="dropdown-item" href="../../directory.php">Cadet Directory</a>
              <a class="dropdown-item" href="https://rpi.account.box.com/login">Media/Documents</a>
                <a class="dropdown-item" href="../../wikihome.php">Wiki</a>
        <?php 
          if(isset($_SESSION["rin"])){
                    $sql = "SELECT admin FROM cadet WHERE rin = (?)";
                    $stmt = $mysqli->prepare($sql);
                    if(!($stmt->bind_param( "i", $_SESSION["rin"] )))
                    {
                        echo "Prepared statement bind failed!";
                    }
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
              
              if($row['admin'] === 1) {
                  echo "<a class=\"dropdown-item\" href=\"../../admin.php\">Admin Page</a>";
              }
        }
                ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../logout.php">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
</body>
</html>

<script src="../js/wiki.js"></script>

<button id="edit" class="btn btn-primary" onclick="editAnnouncements()" type="button">Edit</button>
<button id="save" class="btn btn-primary" onclick="saveAnnouncements()" type="button">Save</button><br>
<div class="announcementswiki"><?php echo $wiki->getBody() ?></div>
