<?php
require_once('./assets/cadet.php');
session_start();
$path = './';
$page = 'Login Page';
include $path . 'assets/inc/header.php';

// Checks to see if user is already logged in
if ( isset($_SESSION['login']) && $_SESSION['login'] )
{
    header('Location: home.php');
}
?>


<form id="login" method="POST" action="loginAuth.php">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter RIN" name="rin" required><br>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>

    <button type="submit" name="submit">Login</button>
    <button type="reset" name="reset">Reset</button>
</form>


<?php include('./assets/inc/footer.php'); ?>