<?php
require_once('./assets/cadet.php');
session_start();
$_SESSION["rin"] = "123123123";

include('./assets/inc/header.php');

$cadet = new cadet( $_SESSION["rin"], $mysqli );
?>

	<div class="card">
  		<div class="card-header">
    		<strong>Log-In</strong>
  		</div>
  		<div class="card-body">
		    <form>
		        <p><strong>RIN: </strong></p><textarea rows="1" cols="30" placeholder="Enter here"></textarea><br>
		        <p><strong>Password: </strong></p><textarea rows="1" cols="30" placeholder="Enter here"></textarea><br>
                <button type="submit">Log In</button>
                <button type="reset">Reset</button>
		    </form>
  		</div>
	</div>

<?php include('./assets/inc/footer.php');