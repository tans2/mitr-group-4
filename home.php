<?php
require_once('./assets/cadet.php');
session_start();

include('./assets/inc/header.php');

// Checks to see if user is already logged in
if ( isset($_SESSION['login']) && $_SESSION['login'] )
{
    $cadet = new cadet( $_SESSION["rin"], $mysqli );
}
else
{
    header('Location: index.php');
}
?>

	<div class="card">
  		<div class="card-header">
    		Activity
  		</div>
  		<div class="card-body">
    		<h5 class="card-title">Morning PT</h5>
    		<p class="card-text">Posted November 5, 2018, 18:00</p>
    		<a href="announcements.html" class="btn btn-primary">View</a>
  		</div>
	</div>

	<div class="card">
  		<div class="card-header">
    		Status
  		</div>
  		<div class="card-body">
    		<h5 class="card-title">Morning PT</h5>
    		<p class="card-text">Posted November 5, 2018, 18:00</p>
    		<a href="announcements.html" class="btn btn-primary">View</a>
  		</div>
	</div>

<?php include('./assets/inc/footer.php') ?>
