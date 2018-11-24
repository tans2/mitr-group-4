<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

// Records user name and password submissions
$rin = $_POST['rin'];
$pass = $_POST['psw'];

// Prepares the query for the DB
$stmt = $mysqli->prepare("SELECT password FROM cadet WHERE rin = ?");
$stmt->bind_param( "s", $rin);

// Go, do it
$stmt->execute();

// Need the results from that select
$stmt->bind_result($res);
$stmt->fetch();

// Verify that the correct password is given
if(password_verify($pass, $res))
{
    $_SESSION['login'] = true;
    $_SESSION['rin'] = $rin;
    header('Location: home.php');
}
else
{
    header('Location: index.php');
}

?>
