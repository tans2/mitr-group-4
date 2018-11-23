<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if( isset($_POST['submit']) )
{
    saveChanges( $_POST['bio'], $_POST['award'], $_POST['afgoal'], $_POST['pgoal'], $cadet, $mysqli );
    
    if(isset($_FILES['file']))
    {
        echo "file";
        $target_dir = "./assets/images/";        
        $ext = ".jpg";
        $target_file = $target_dir . $_SESSION['rin'] . $ext;
        $temp_file = $_FILES["file"]["tmp_name"];
        
        // Check if file already exists
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        move_uploaded_file($temp_file, $target_file); 
    }

    
}
?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <p><strong>Profile Picture: </strong></p><input type="file" placeholder="Enter name here" name="file">
        <p><strong>Bio: </strong></p><textarea rows="10" cols="100" name="bio" textarea><?php echo $cadet->getBio() ?></textarea><br>
        <p><strong>Awards and Achievements: </strong></p><textarea rows="10" cols="100" name="award"><?php echo $cadet->getAwards() ?></textarea><br>
        <p><strong>Air Force Goals: </strong></p><textarea rows="10" cols="100" name="afgoal"><?php echo $cadet->getAirForceGoals() ?></textarea><br>
        <p><strong>Personal Goals: </strong></p><textarea rows="10" cols="100" name="pgoal"><?php echo $cadet->getPersonalGoals() ?></textarea><br>
        <button type="reset">Reset</button>
        <button type="submit" name="submit">Save Changes</button>
    </form>
    <br><br>
  


<?php
    function saveChanges( $bio, $awards, $AFGoals, $PGoals, $cadet, $mysqli ) 
    {
        $cadet->setBio($bio);
        $cadet->setAwards($awards);
        $cadet->setAirForceGoals($AFGoals);
        $cadet->setPersonalGoals($PGoals);
        $cadet->updateCadet( $mysqli );
    }
        
    include('./assets/inc/footer.php');   
?>