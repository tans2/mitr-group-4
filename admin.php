<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if( $cadet->getAdmin() != 1 )
{
    header('Location: home.php');
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
    $smt->bind_param( "issssis", $_POST['rin'], $hash, $_POST['rank'], $_POST['first'], $_POST['last'], $_POST['admin'], $_POST['flight'] );
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
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
    </div>
    <div>
      Rank:<br>
      <select name="rank">
        <option value="None">None</option>
        <optgroup label="ROTC Ranks">
            <option value="AS100">AS100</option>
            <option value="AS200">AS200</option>
            <option value="AS250">AS250</option>
            <option value="AS300">AS300</option>
            <option value="AS350">AS350</option>
            <option value="AS400">AS400</option>
            <option value="AS500">AS500</option>
        </optgroup>
        <optgroup label="Enlisted Ranks">
            <option value="Airman Basic">Airman Basic</option>
            <option value="Airman">Airman</option>
            <option value="Airman First Class">Airman First Class</option>
            <option value="Senior Airman">Senior Airman</option>
            <option value="Staff Sergeant">Staff Sergeant</option>
            <option value="Technical Sergeant">Technical Sergeant</option>
            <option value="Master Sergeant">Master Sergeant</option>
            <option value="Senior Master Sergeant">Senior Master Sergeant</option>
            <option value="Chief Master Sergeant">Chief Master Sergeant</option>
        </optgroup>
        <optgroup label="Officer Ranks">
            <option value="Second Lieutenant">Second Lieutenant</option>
            <option value="First Lieutenant">First Lieutenant</option>
            <option value="Captain">Captain</option>
            <option value="Major">Major</option>
            <option value="Lieutenant Colonel">Lieutenant Colonel</option>
            <option value="Colonel">Colonel</option>
            <option value="Brigadier General">Brigadier General</option>
            <option value="Major General">Major General</option>
            <option value="Lieutenant General">Lieutenant General</option>
            <option value="General">General</option>
        </optgroup>
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
        Card Input:<br>
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
<div id="Edit Groups" class="card" style = "position: absolute;right: 0px;bottom: 0px;width: 50%;height: 25%;">
    <div class="card-body">
            <form id="makegroup" method="POST" name="makegroup" action="group.php">
                <strong>Create Group:</strong><br>
                <input type="text" name="groupname" id="groupname"><br>
                <button type="submit" name="submit">Create Group</button>
            </form><br>

            <?php 
                if(isset($_POST['selectgroup']))
                {
                    $_SESSION['selectgroup'] = $_POST['selectgroup'];
                } 
            ?>

            <h3>Select Group</h3>
            <form id="selectgroup" method="POST" name="selectgroup" action="sendemail.php">
                <select id="selectgroup" name="selectgroup">
                <?php
                    $query = 'SELECT * FROM cadetGroup';
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        if(isset($_SESSION['selectgroup']) && $_SESSION['selectgroup'] == $row['id'])
                        {
                            echo "<option selected value ='" . $row['id'] . "'>" . $row['label'] . "</option>";
                        }
                        else
                        {
                            echo "<option value ='" . $row['id'] . "'>" . $row['label'] . "</option>";
                        }
                        
                    }
                ?>
                </select><br>
                <button type="submit" name="submit">Select Group</button>
            </form><br>



            <form id="addgroup" method="POST" name="addgroup" action="group.php">
                <strong>Add Members</strong><br> 
                <div class="selectcadets" style="height:100px; width:100px overflow-y: scroll;">
                <?php
                    $query = 'SELECT * FROM cadet';
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        echo "<input type='checkbox' name='acadets[]' value ='" . $row['rin'] . "'>Cadet " . $row['lastName'] . "</input><br>";
                    }
                ?>
            </div><br>
            
            <button type="submit" name="submit">Add Members</button>
        </form><br>
        
        <form id="addgroup" method="POST" name="addgroup" action="group.php">
            <strong>Remove Members</strong><br> 
            <div class="selectcadets" style="height:100px; width:100px overflow-y: scroll;">
            <?php
                $query = 'SELECT cadet.rin as rin, cadet.lastName as lastName FROM cadet, groupMember WHERE cadet.rin = groupMember.rin AND groupMember.groupID = ?';
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param( "i", $_SESSION['selectgroup'] );
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo "<input type='checkbox' name='rcadets[]' value ='" . $row['rin'] . "'>Cadet " . $row['lastName'] . "</input><br>";
                }
            ?>
            </div><br>
            
            <button type="submit" name="submit">Remove Members</button>
        </form>
    </div>
</div>
</body>
</html>


<?php include('./assets/inc/footer.php'); ?>