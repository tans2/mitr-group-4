<?php
require_once('./assets/cadet.php');
session_start();

// Temporory just for texting
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

include('./assets/inc/header.php');
?>

    <form>
        <p><strong>Profile Picture: </strong></p><input type="file" placeholder="Enter name here">
        <p><strong>Bio: </strong></p><textarea rows="10" cols="100"<textarea><?php echo $cadet->getBio() ?></textarea><br>
        <p><strong>Awards and Achievements: </strong></p><textarea rows="10" cols="100"><?php echo $cadet->getAwards() ?></textarea><br>
        <p><strong>Air Force Goals: </strong></p><textarea rows="10" cols="100"><?php echo $cadet->getGoals() ?></textarea><br>
        <p><strong>Personal Goals: </strong></p><textarea rows="10" cols="100"><?php echo $cadet->getGoals() ?></textarea><br>

    </form>
    <br><br>
    <button type="Reset">Reset</button>
    <button type="Submit">Save Changes</button>


<?php
    function saveChanges( $bio, $awards, $goals ) 
    {
        $cadet->setBio($bio);
        $cadet->setAwards($awards);
        $cadet->setGoals($goals);
        $cadet->updateCadet();
    }
        
    include('./assets/inc/footer.php');   
?>