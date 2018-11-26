<?php 
include('./assets/inc/header.php'); 

// Check if the passwords are the same if there is uname, pass, pass2 and both pass and pass2 match
if( isset($_POST['rin']) && isset($_POST['pass']) && isset($_POST['pass2']) && passMatch())
{
    $smt = $mysqli->prepare("INSERT INTO cadet (rin, password, rank, firstName, middleName, lastName, admin, flight) VALUES (?,?,?,?,?,?,?,?)");
    $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $smt->bind_param( "isssssis", $_POST['rin'], $hash, $_POST['rank'], $_POST['first'], $_POST['middle'], $_POST['last'], $_POST['admin'], $_POST['flight'] );
    $smt->execute();
    $smt->close();
    
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

<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return validateNewUser();">
    <div>
      First Name:<br>
      <input type="text" name="first" size="30"/>
    </div>
    <div>
      Middle Name:<br>
      <input type="text" name="middle" size="30"/>
    </div>
    <div>
      Last Name:<br>
      <input type="text" name="last" size="30"/>
    </div>
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
        <option value="Alpha">Alpha</option>
        <option value="Bravo">Bravo</option>
        <option value="Charlie">Charlie</option>
        <option value="Delta">Delta</option>
        <option value="Echo">Echo</option>
        <option value="Foxtrot">Foxtrot</option>
      </select>
    </div>
    <br>
    <div class="clearfix">
      <input class="btn btn-primary" type="submit" value="Add Cadet" />
      <input class="btn btn-primary" type="reset" value="Reset"/>
    </div>
  </form><br>
</div>

<?php include('./assets/inc/footer.php'); ?>
