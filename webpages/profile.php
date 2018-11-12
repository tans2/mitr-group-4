<?php
require_once('../assets/cadet.php');
session_start();
$_SESSION["rin"] = "123123123";

$host = "192.168.64.2";
$user = "username";
$password = "password";
$database = "mitr";

// Create connection
$mysqli = mysqli_connect($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";
$cadet = new cadet( $_SESSION["rin"], $mysqli );

include('../assets/inc/header.php');
?>


  	<div class="jumbotron">
     <!-- <img src="CadetPic.JPG" width="300" height="400"/> --> 
    	<h1 class="display-4"><?php echo "Cadet " . $cadet->getLast() ?></h1>
    	<p class="lead">
        <strong>Contact Information: </strong><br>
        <strong>Email: </strong> <?php echo $cadet->getPrimEmail() ?><br>
        <strong>Phone Number: </strong> <?php echo $cadet->getPrimPhone() ?><br>
        <strong>Flight: </strong> <?php echo $cadet->getFlight() ?><br>
        <strong>Position: </strong> <?php echo $cadet->getPosition() ?><br>
      </p>
    	<hr class="my-4">
    		<p><strong>Rank:</strong> <?php echo $cadet->getRank() ?></p>
        <p><strong>Bio: </strong><?php echo $cadet->getBio() ?></p>
        <p><strong>Awards and Achievements: </strong><?php echo $cadet->getAwards() ?></p>
        <p><strong>Air Force Goals: </strong><?php echo $cadet->getGoals() ?></p>
        <p><strong>Personal Goals: </strong>Hike Mount Everest </p>
   	 <a class="btn btn-primary btn-lg" role="button" href="editprofile.php">Edit Page</a>
  	</div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
