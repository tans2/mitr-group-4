<?php
include('./assets/inc/header.php');
if( isset($_POST['rin']) && isset($_POST['psw']) )
{
    // Records user name and password submissions
    if(is_numeric($_POST['rin']))
    {
        $stmt = $mysqli->prepare("SELECT * FROM cadet WHERE rin = ?");
        $stmt->bind_param( "i", $_POST['rin']);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    else
    {
        $stmt = $mysqli->prepare("SELECT * FROM cadet WHERE primaryEmail = ?");
        $stmt->bind_param( "s", $_POST['rin']);
        $stmt->execute();
        $result = $stmt->get_result();
    }
    $pass = $_POST['psw'];

    // Need the results from that select
    if($row = $result->fetch_assoc())
    {
        // Verify that the correct password is given
        if(password_verify($pass, $row['password']))
        {
            $_SESSION['login'] = true;
            $_SESSION['rin'] = $row['rin'];
            header('Location: home.php');
        }
    }
    $_SESSION['fail'] = true;
    header('Location: index.php');
}
else
{
    $_SESSION['fail'] = true;
    header('Location: index.php');
}
?>
