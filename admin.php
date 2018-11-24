<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if(isset($_POST['submit']))
{
    $smt = $mysqli->prepare("DELETE FROM cadet WHERE rin = ?");
    $smt->bind_param( "i", $_SESSION['remove'] );
    $smt->execute();
    $smt->close();
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
        <h2 id="memHeader">Add user to website</h2>
        <a href="addcadet.php" style="float:left;">Create User</a><br>
        <h2 id="memHeader">Remove user to website</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <select size="10" style="width:50%;">
                <?php 
                    $stmt = $mysqli->prepare("SELECT * FROM cadet");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc())
                    {
                        if(!empty($row['firstName']))
                        {
                            echo "<option value=\"" . $row['rin'] . "\">" . $row['firstName'] . " " . $row['lastName'] . "</option>";
                            $_SESSION['remove'] = $row['rin'];
                        }
                    }
                ?>
            </select><br>
            <button name="submit" type="submit">Remove</button>
        </form>
    </div>
</div>
</body>
</html>


<?php include('./assets/inc/footer.php'); ?>