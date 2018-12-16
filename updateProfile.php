<?php
    include('./assets/inc/header.php'); 

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
    {
        header('Location: index.php');
    }

    if(isset($_POST['submit']))
    {
        $uploadOK = 1;
        $cadet->setPrimPhone($_POST['pphone']);
        $cadet->setSecPhone($_POST['sphone']);
        $cadet->setPrimEmail($_POST['pemail']);
        $cadet->setSecEmail($_POST['semail']);
        $cadet->setGroupMe($_POST['groupme']);
        $cadet->setPosition($_POST['position']);
        $cadet->setMajor($_POST['major']);
    }

    if(isset($_POST['cadetbio']))
    {
        $cadet->setBio($_POST['cadetbio']);
        $cadet->updateCadet( $mysqli );
        header('Location: editprofile.php');
    }

    if(isset($_POST['afgoals']))
    {
        $cadet->setAirForceGoals($_POST['afgoals']);
        $cadet->updateCadet( $mysqli );
        header('Location: editprofile.php');
    }

    if(isset($_POST['pgoals']))
    {
        $cadet->setPersonalGoals($_POST['pgoals']);
        $cadet->updateCadet( $mysqli );
        header('Location: editprofile.php');
    }

    if(isset($_POST['awards']))
    {
        $cadet->setAwards($_POST['awards']);
        $cadet->updateCadet( $mysqli );
        header('Location: editprofile.php');
    }


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

    if( !isset($uploadOK) || $uploadOK == 1 )
    {
        header('Location: myprofile.php');
    }
?>