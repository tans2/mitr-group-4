<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

    <form>
        <p><strong>Profile Picture: </strong></p><input type="file" placeholder="Enter name here">
        <p><strong>Bio: </strong></p><textarea rows="10" cols="100"<textarea><?php echo $cadet->getBio() ?></textarea><br>
        <p><strong>Awards and Achievements: </strong></p><textarea rows="10" cols="100"><?php echo $cadet->getAwards() ?></textarea><br>
        <p><strong>Air Force Goals: </strong></p><textarea rows="10" cols="100"><?php echo $cadet->getAirForceGoals() ?></textarea><br>
        <p><strong>Personal Goals: </strong></p><textarea rows="10" cols="100"><?php echo $cadet->getPersonalGoals() ?></textarea><br>

    </form>
    <br><br>
    <button type="Reset">Reset</button>
    <button type="Submit">Save Changes</button>


<?php
    function saveChanges( $bio, $awards, $AFGoals, $PGoals ) 
    {
        $cadet->setBio($bio);
        $cadet->setAwards($awards);
        $cadet->setAirForceGoals($AFGoals);
        $cadet->setPersonalGoals($PGoals);
        $cadet->updateCadet();
    }
        
    include('./assets/inc/footer.php');   
?>