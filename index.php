<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Home</title>
    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
    
    <?php 
if ( isset($_SESSION['login']) && $_SESSION['login'] )
{
    header('Location: home.php');
}
?>

<body class="text-center"> 
<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
  <div class="card-body">
  	<form id="login" method="POST" action="loginAuth.php">
      <img class="mb-4" src="assets/images/airforcelogo.png" alt width="95" height="80">
      <h5 class="card-title">Please Sign In</h5>
      <label for="uname"><b>Username</b></label><br>
      <input type="text" placeholder="Enter RIN" name="rin" required><br>

      <label for="psw"><b>Password</b></label><br>
      <input type="password" placeholder="Enter Password" name="psw" required><br>
      <br>
      <button class="btn btn-sm btn-primary" type="submit" name="submit">Login</button>
      <button class="btn btn-sm btn-secondary" type="reset" name="reset">Reset</button>
    </form>
  </div>
</div>
</body>
</html>


<?php include('./assets/inc/footer.php'); ?>
