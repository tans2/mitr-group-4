<?php
    include('./assets/inc/header.php'); 

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
    {
        header('Location: index.php');
    }

    if(isset($_POST['submit']))
    {
        saveGenInfo( $cadet, $mysqli, $_POST['pphone'], $_POST['sphone'], $_POST['pemail'], $_POST['semail'], $_POST['groupme'], $_POST['position'] );
    }

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
    }

   function saveGenInfo( $cadet, $mysqli, $pPhone, $sPhone, $pEmail, $sEmail, $groupMe, $position ) 
    {
        $cadet->setPrimPhone($pPhone);
        $cadet->setSecPhone($sPhone);
        $cadet->setPrimEmail($pEmail);
        $cadet->setSecEmail($sEmail);
        $cadet->setGroupMe($groupMe);
        $cadet->setPosition($position);
    }

    if(isset($_POST['bio']))
    {
        $cadet->setBio($_POST['bio']);
    }

    if(isset($_POST['aa']))
    {
        $cadet->setAwards($_POST['aa']);
    }

    if(isset($_POST['afg']))
    {
        $cadet->setAirForceGoals($_POST['afg']);
    }

    if(isset($_POST['pg']))
    {
        $cadet->setPersonalGoals($_POST['pg']);
    }
    
    if(isset($_POST['updatepass']))
    {
        $cadet->setPass($_POST['newPass']);
    }

    $cadet->updateCadet( $mysqli );
    header('Location: myprofile.php');
?>