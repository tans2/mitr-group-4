<?php
require_once('./assets/cadet.php');
session_start();

include('./assets/inc/header.php');

// Checks to see if user is already logged in
if ( isset($_SESSION['login']) && $_SESSION['login'] )
{
    $cadet = new cadet( $_SESSION["rin"], $mysqli );
}
else
{
    header('Location: index.php');
}
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