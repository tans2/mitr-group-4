<?php
    include('./assets/inc/header.php'); 

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
    {
        header('Location: index.php');
    }
    
    if(isset($_POST['afg']))
    {
        $cadet->setBio($_POST['afg']);
        $cadet->updateCadet();
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

    if(isset($_GET['bio']))
    {
        $cadet->setBio($_GET['bio']);
    }

    if(isset($_GET['aa']))
    {
        $cadet->setAwards($_GET['aa']);
    }

    if(isset($_GET['afg']))
    {
        $cadet->setAirForceGoals($_GET['afg']);
    }

    if(isset($_GET['pg']))
    {
        $cadet->setPersonalGoals($_GET['pg']);
    }
    
    if(isset($_POST['updatepass']))
    {
        $cadet->setPass($_POST['newPass']);
    }

    $cadet->updateCadet( $mysqli );
    header('Location: myprofile.php');
?>