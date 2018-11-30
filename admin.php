<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if(isset($_POST['submit']))
{
    $smt = $mysqli->prepare("DELETE FROM cadet WHERE rin = ?");
    $smt->bind_param( "i", $_POST['remove'] );
    $smt->execute();
    $smt->close();
}

// Check if the passwords are the same if there is uname, pass, pass2 and both pass and pass2 match
if( isset($_POST['rin']) && isset($_POST['pass']) && isset($_POST['pass2']) && passMatch())
{
    $smt = $mysqli->prepare("INSERT INTO cadet (rin, password, rank, firstName, lastName, admin, flight) VALUES (?,?,?,?,?,?,?)");
    $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $smt->bind_param( "isssssis", $_POST['rin'], $hash, $_POST['rank'], $_POST['first'], $_POST['last'], $_POST['admin'], $_POST['flight'] );
    $smt->execute();
    $smt->close();
    
    if (isset($_POST['rin']) && isset($_POST['newrfid'])) {
		$cadetrin = trim($_POST['rin']);
		$cadetrfid = trim($_POST['newrfid']);

		$updatequery = 'UPDATE cadet SET rfid = ? WHERE rin = ?';
		$stmt = $mysqli->prepare($updatequery);
		$stmt->bind_param("ii", $cadetrfid, $cadetrin);
		$stmt->execute();
		$stmt->close();
	} else {
		echo '<script> alert(You must enter both a valid RIN and scan the ID card);</script>';
	}
    
    header('Location: admin.php');
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
    <script src="assets/js/addCadet.js"></script>
</head>


<body>
<div class="card" style="position: absolute;left: 0px;width: 50%">
  <div id="memWrapper" class="card-body">
    <h5 id="memHeader" class="card-title">Add User</h5> 
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateNewUser();" name="createcadet">
    <div>
      First Name:<br>
      <input type="text" name="first" size="30" id="firstname"/>
    </div>
    <div>
      Last Name:<br>
      <input type="text" name="last" size="30" id="lastname"/>
    </div>
    <div>
      RIN:<br>
      <input type="text" name="rin" size="30" id="rin"/>
    </div>
    <div>
      Password:<br>
      <input type="password" name="pass" size="30" id="password"/>
    </div>
    <div>
      Confirm Password:<br>
      <input type="password" name="pass2" size="30" id="confpassword"/>
    </div>
    <div>
      Administrative Privleges:<br>
      <select name="admin">
        <option value="1">Yes</option>
        <option value="0">No</option>
      </select>
    </div>
    <div>
      Rank:<br>
      <select name="rank">
        <option value="None">None</option>
        <option value="AS100">AS100</option>
        <option value="AS200">AS200</option>
        <option value="AS250">AS250</option>
        <option value="AS300">AS300</option>
        <option value="AS350">AS350</option>
        <option value="AS400">AS400</option>
        <option value="AS500">AS500</option>
      </select>
    </div>
    <div>
      Flight:<br>
      <select name="flight">
        <option value="None">None</option>
        <option value="Alpha">Alpha</option>
        <option value="Bravo">Bravo</option>
        <option value="Charlie">Charlie</option>
        <option value="Delta">Delta</option>
        <option value="Echo">Echo</option>
        <option value="Foxtrot">Foxtrot</option>
      </select>
    </div>
    <div class="clearfix">
        RPI ID Card:<br>
        <input type="text" name="newrfid"/><br>
    </div>
    <br>
    <div class="clearfix">
      <input class="btn btn-primary" type="submit" value="Add Cadet" />
      <input class="btn btn-primary" type="reset" value="Reset"/>
    </div>
  </form><br>
</div>
</div>

<div id="makeuser" class="card" style="position: absolute;right: 0px;width: 50%">  
  <div id="memWrapper" class="card-body">
    <!-- <h5 id="memHeader" class="card-title">Add User</h5> 
    <a href="addcadet.php" class="card-title" style="float:left;">Create User</a><br></br> --> 
    <h5 id="memHeader" class="card-title">Remove User</h5>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <select name="remove" size="10" style="width:80%;">
                <?php 
                    $stmt = $mysqli->prepare("SELECT * FROM cadet");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc())
                    {
                        if(!empty($row['firstName']))
                        {
                            echo "<option value='" . $row['rin'] . "'>" . $row['firstName'] . " " . $row['lastName'] . "</option>";
                        }
                    }
                ?>
            </select><br></br>
            <button class="btn btn-primary" name="submit" type="submit">Remove</button>
        </form>
    </div>
</div>
    
<div id="makeuser" class="card" style="position: absolute;right: 0px;bottom: 0px;width: 50%;height: 50%;">  
    <div id="memWrapper" class="card-body">
        <a class="btn btn-primary" href="attend.php">Set Event Attendance</a>
    </div>
</div>
</body>
</html>


<?php include('./assets/inc/footer.php'); ?>