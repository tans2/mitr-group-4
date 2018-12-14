<?php
    include('./assets/inc/header.php'); 

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
    {
        header('Location: index.php');
    }

    if(isset($_POST['submit']))
    {
        $uploadOK = 1;
        saveGenInfo( $cadet, $mysqli, $_POST['pphone'], $_POST['sphone'], $_POST['pemail'], $_POST['semail'], $_POST['groupme'], $_POST['position'], $_POST['major'] );
    }

   function saveGenInfo( $cadet, $mysqli, $pPhone, $sPhone, $pEmail, $sEmail, $groupMe, $position, $major ) 
    {
        $cadet->setPrimPhone($pPhone);
        $cadet->setSecPhone($sPhone);
        $cadet->setPrimEmail($pEmail);
        $cadet->setSecEmail($sEmail);
        $cadet->setGroupMe($groupMe);
        $cadet->setPosition($position);
        $cadet->setMajor($major);
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

    if(isset($_FILES['file']))
    {
        $target_dir = "./assets/images/";        
        $ext = ".jpg";
        $target_file = $target_dir . $_SESSION['rin'] . $ext;
        $temp_file = $_FILES["file"]["tmp_name"];
        if ($_FILES["file"]["size"] > 500000) 
        {
            echo "<script type='text/javascript'>
            alert('Sorry, your file is too large! Your file size is: " . $_FILES["file"]["size"] . " bytes and it needs to be < 500000 bytes (500kb)');
            window.location.href='editprofile.php';
            </script>";
            $uploadOK = 0;
        }
        else
        {
            // Check if file already exists
            if (file_exists($target_file)) 
            {
                unlink($target_file);
            }

            move_uploaded_file($temp_file, $target_file);  
        }
    }

    if( $uploadOK == 1 )
    {
        header('Location: myprofile.php');
    }
?>