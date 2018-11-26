<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if( isset($_POST['submit']) )
{
    saveChanges( $_POST['bio'], $_POST['award'], $_POST['afgoal'], $_POST['pgoal'], $cadet, $mysqli, $_POST['pphone'], $_POST['sphone'], $_POST['pemail'], $_POST['semail'], $_POST['groupme'], $_POST['position'] );
    
    if(isset($_FILES['file']))
    {
        $target_dir = "./assets/images/";        
        $ext = ".jpg";
        $target_file = $target_dir . $_SESSION['rin'] . $ext;
        $temp_file = $_FILES["file"]["tmp_name"];
        
        // Check if file already exists
        if (file_exists($target_file)) {
            unlink($target_file);
        }

        move_uploaded_file($temp_file, $target_file); 
        
        header('Location: myprofile.php');
    }

    
}
?>

<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <p><strong>Profile Picture: </strong></p><input type="file" placeholder="Enter name here" name="file"><br><br>
        <div>
            <strong>Primary Email:</strong><br>
            <input type="text" name="pemail" size="30" value="<?php echo $cadet->getPrimEmail() ?>"/>
        </div><br>
        <div>
            <strong>Secondary Email:</strong><br>
            <input type="text" name="semail" size="30" value="<?php echo $cadet->getSecEmail() ?>"/>
        </div><br>
        <div>
            <strong>Primary Phone:</strong><br>
            <input type="text" name="pphone" size="30" value="<?php echo $cadet->getPrimPhone() ?>"/>
        </div><br>
        <div>
            <strong>Secondary Phone:</strong><br>
            <input type="text" name="sphone" size="30" value="<?php echo $cadet->getSecPhone() ?>"/>
        </div><br>
        <div>
            <strong>GroupMe:</strong><br>
            <input type="text" name="groupme" size="30" value="<?php echo $cadet->getGroupMe() ?>"/>
        </div><br>
        <div>
            <strong>Position:</strong><br>
            <input type="text" name="position" size="30" value="<?php echo $cadet->getPosition() ?>"/>
        </div><br>
        <p><strong>Bio: </strong></p><textarea rows="10" cols="30" name="bio" textarea><?php echo $cadet->getBio() ?></textarea><br>
        <p><strong>Awards and Achievements: </strong></p><textarea rows="10" cols="30" name="award"><?php echo $cadet->getAwards() ?></textarea><br>
        <p><strong>Air Force Goals: </strong></p><textarea rows="10" cols="30" name="afgoal"><?php echo $cadet->getAirForceGoals() ?></textarea><br>
        <p><strong>Personal Goals: </strong></p><textarea rows="10" cols="30" name="pgoal"><?php echo $cadet->getPersonalGoals() ?></textarea><br>
        <button class="btn btn-primary" type="reset">Reset</button>
        <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
    </form>
    <br><br>
</div>


<?php
    function saveChanges( $bio, $awards, $AFGoals, $PGoals, $cadet, $mysqli, $pPhone, $sPhone, $pEmail, $sEmail, $groupMe, $position ) 
    {
        $cadet->setBio($bio);
        $cadet->setAwards($awards);
        $cadet->setAirForceGoals($AFGoals);
        $cadet->setPersonalGoals($PGoals);
        $cadet->setPrimPhone($pPhone);
        $cadet->setSecPhone($sPhone);
        $cadet->setPrimEmail($pEmail);
        $cadet->setSecEmail($sEmail);
        $cadet->setGroupMe($groupMe);
        $cadet->setPosition($position);
        $cadet->updateCadet( $mysqli );
    }
        
    include('./assets/inc/footer.php');   
?>