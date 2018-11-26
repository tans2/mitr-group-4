<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

	<div class="card" style="position: absolute;left: 0px;width: 50%;">
  		<div class="card-header">
    		Activity
  		</div>
  		<div class="card-body">
    		<h5 class="card-title">Morning PT</h5>
    		<p class="card-text">Posted November 5, 2018, 18:00</p>
    		<a href="announcements.php" class="btn btn-primary">View</a>
  		</div>
	</div>

	<div class="card" style="position: absolute;right: 0px;width: 50%;">
  		<div class="card-header">
    		Status
  		</div>
  		<div class="card-body">
        <h5 class="card-title">Morning PT</h5>
    		<p class="card-text">Attendance: 100%</p>
        <h5 class="card-title">Leadership Labs</h5>
        <p class="card-text">Attendance: 100%</p>
    		<a href="announcements.php" class="btn btn-primary">View</a>
  		</div>
	</div>

<?php include('./assets/inc/footer.php') ?>
