<?php
    include('./assets/inc/header.php'); 
    if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
    {
        header('Location: index.php');
    }
    include("emailPHP.php");
    if (isset($_POST["send"])){
        if(!isset($_POST["To"]) && (!isset($_POST["groups"]) || $_POST["groups"] = "null" || in_array("null", $_POST["groups"]))){
            echo "<script type='text/javascript'>alert('There are no email addresses to send to');</script>";
        } else {
            if(isset($_POST["To"])){
                $trimmed = str_replace(" ", "",$_POST["To"]);
                $addresses = explode(";", $trimmed);
            }
            if(isset($_POST["groups"]) && $_POST["groups"] != "null" && !in_array("null", $_POST["groups"])){
                $query = 'SELECT primaryEmail AS email FROM (cadet LEFT JOIN groupMember ON cadet.rin = groupMember.rin) LEFT JOIN cadetGroup ON groupMember.groupID = cadetGroup.id WHERE cadetGroup.label = ?';
                $stmt = $mysqli->prepare($query);
                $size = count($_POST["groups"]);
                for($x = 0; $x < $size; $x++) { 
                    $stmt->bind_param("s", $_POST['groups'][$x]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()){
                        $addresses[] = $row['email'];
                    }
                }
            }
            echo(send($addresses, $_POST["subject"], $_POST["body"]));
        }
    }   

    header('Location: sendemail.php')
    ?>