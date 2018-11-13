<?php

session_start();
$path = './';
$page = 'Admin Page';
include $path . 'assets/inc/header.php';

// Check if the passwords are the same if there is uname, pass, pass2 and both pass and pass2 match
if( isset($_POST['rin']) && isset($_POST['pass']) && isset($_POST['pass2']) && passMatch())
{
    $smt = $mysqli->prepare("INSERT INTO cadet (rin, password) VALUES (?, ?)");
    $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $smt->bind_param( "ss", $_POST['rin'], $hash );
    $smt->execute();
    $smt->close();
}

// Checks to make sure the confirmation password and actual password match
function passMatch()
{
    if(strcmp($_POST['pass'], $_POST['pass2']) == 0)
    {
        // Passwords matched
        return true;
    }
    else
    {
        // Passwords didn't match
        return false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register</title>
    <style type="text/css">
        form div
        {
            margin: 1em;
        }
        form div label
        {
            float: left;
            width: 10%;
        }
        form div.radio {
            float: left;
        }
        .clearfix {
            clear: both;
        }
    </style>
</head>
<body>
<div id="makeuser">
    <a id="logout" href="logout.php">Logout</a>
    
    <div id="memWrapper" class="column">
        <h1 id="memHeader">Add a Cadet</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateNewUser();">
            <div>
                RIN:<br>
                <input type="text" name="rin" size="30"/>
            </div>
            <div>
                Password:<br>
                <input type="password" name="pass" size="30"/>
            </div>
            <div>
                Confirm Password:<br>
                <input type="password" name="pass2" size="30"/>
            </div>
            <div class="clearfix">
                <input class="button" type="submit" value="Add Cadet" />
                <input class="button" type="reset" value="Reset" />
            </div>
        </form><br>
    </div>
</div>
</body>
</html>


<?php include('./assets/inc/footer.php'); ?>