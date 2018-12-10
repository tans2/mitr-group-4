<?php
include('assets/inc/dbinfo.php');
if(isset($_POST['rin']))
{
    $rin = $_POST['rin'];
    $email[] = $_POST['email'];
    
    $stmt = $mysqli->prepare("SELECT * FROM cadet WHERE rin = ?");
    $stmt->bind_param( "i", $rin);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc())
    {
        if($row['primaryEmail'] == array_values($email)[0])
        {
            // Records user name and password submissions
            $pass = randomPassword();
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            // Prepares the query for the DB
            $stmt = $mysqli->prepare("UPDATE cadet SET password = ? WHERE rin = ?");
            $stmt->bind_param( "si", $hash, $rin);
            $stmt->execute();
        //    $stmt->bind_result($res);
        //    $stmt->fetch();
            
            // 
            // HERE IS WHERE THE EMAIL SHOULD BE SENT WITH $pass 
            //
            include("emailPHP.php");
            $message = "<h2>Password Reset</h2>
                        <p>The below is your temporary password please change it as soon as possible!</p>
                        <br><br>
                        <p>Temporary Password: " . $pass . "</p>";
            echo(send($email, "Password Reset", $message));
            echo("<script>window.location.href = 'index.php';</script>");
            //header('Location: index.php');
        }
        else
        {
            echo "<alert>The email you provided does not match the primary email we have on record for " . $row['firstName'] . " " . $row['lastName'] . "</alert>"; 
        }
    }
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 10; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Home</title>
    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    
    <style>
@media (max-width: 500px) {
    div.card {
        width: 100%;
    }
}
        @media (min-width: 500px) {
    div.card {
        width: 40%;
    }
}
</style>
    
</head>
    
    <?php 
    session_start();
?>

<body class="text-center"> 
<div class="card" style="margin: auto;padding: 10px;">
  <div class="card-body">
  	<form id="login" method="POST" action="forgotpass.php">
      <h5 class="card-title">Password Reset</h5>
        <p>(sends new temporary password to your email)</p><br>
              <label for="fname"><b>First Name</b></label><br>
      <input class="form-control" type="text" placeholder="Enter First Name" name="fname" id="fname" required><br>
        
              <label for="lname"><b>Last Name</b></label><br>
      <input class="form-control" type="text" placeholder="Enter Last Name" name="lname" id="lname" required><br>
        
      <label for="rin"><b>RIN</b></label><br>
      <input class="form-control" type="text" placeholder="Enter RIN" name="rin" id="rin" required><br>
        
        <label for="email"><b>Email</b></label><br>
      <input class="form-control" type="text" placeholder="Enter Email" name="email" id="email" required><br>

      <button class="btn btn-sm btn-primary" type="submit" name="submit">Reset Password</button>
    </form>
  </div>
</div>
</body>
</html>


<!-- <?php /* include('./assets/inc/footer.php'); */ ?> --> 
