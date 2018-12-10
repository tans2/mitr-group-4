<?php
    include('./assets/inc/header.php');
    session_start();

    if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
    {
        header('Location: index.php');
    }
    if(isset($_POST['groupname']))
    {
        $smt = $mysqli->prepare("INSERT INTO cadetGroup (label) VALUES (?)");
        $smt->bind_param( "s", $_POST['groupname'] );
        $smt->execute();
        $smt->close();
    }
    else if(isset($_POST['selectgroup']))
    {
        $query = 'SELECT * FROM cadetGroup WHERE label = ?';
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param( "s", $_POST['selectgroup'] );
        $stmt->execute();
        $result = $stmt->get_result();
        $group = $result->fetch_assoc();
        foreach ($_POST['cadets'] as $member) 
        {
            $smt = $mysqli->prepare("INSERT INTO groupMember (groupID, rin) VALUES (?,?)");
            $smt->bind_param( "si", $group['id'], $member );
            $smt->execute();
            $smt->close();
        }
    }
    else if(isset($_POST['rcadets']))
    {
        foreach ($_POST['rcadets'] as $member) 
        {
            $smt = $mysqli->prepare("DELETE FROM `groupMember` WHERE `groupMember`.`groupID` = ? AND `groupMember`.`rin` = ?");
            $smt->bind_param( "ii", $_SESSION['selectgroup'], $member );
            $smt->execute();
            $smt->close();
        }
    }
    else if(isset($_POST['acadets']))
    {
        foreach ($_POST['acadets'] as $member) 
        {
            $smt = $mysqli->prepare("INSERT INTO groupMember (groupID, rin) VALUES (?,?)");
            $smt->bind_param( "ii", $_SESSION['selectgroup'], $member );
            $smt->execute();
            $smt->close();
        }
    }
    header("Location: addgroup.php");

?>