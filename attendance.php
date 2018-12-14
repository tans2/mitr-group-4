<?php include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<head>
	<title>Cadet Events</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<style>
/* Styles for mobile */
@media (max-width: 500px) 
{
    .col-6
    {
        flex: 100%;
        max-width: 100%;
        padding-bottom: 10px;
    }
    body
    {
        min-width: 400px;
    }
}
</style>
<body>
  <div class="jumbotron container-fluid">
  	<h1 class="display-4"> Events </h1>
  	<div class="container">
      <div class="row">
        <div class="col-6">
		      <div class="card" style="margin: auto;padding: 10px;">
		        <h5 class="card-title">Create an Event</h5>
  		    <form action="createEvent.php" method="post" name="makeevent">
  			   <label for=title><b>Title: </b></label><br><input class="form-control" type="text" name="eventTitle"/><br>
  			   <label for=date><b>Date: </b></label><br><input class="form-control" type="datetime-local" name="eventDate"/><br>
  			   <label for=mandatory><b>Event Type: </b></label><br><select name="type"><option value="nonpmt">Non PMT</option><option value="pt">PT</option><option value="llab">LLAB</option></select><br><br> 
  			   <button class="btn btn-sm btn-primary" type="submit" value="Submit" name="eventMade">Submit</button>
  			  </form>
		      </div>
		    </div>
		
    		<div class="col-6">
    	    <div class="card" style="margin: auto;width: 100%;padding: 10px;">
    			<h5 class="card-title"> Select Event</h5>
    			<form action="viewEvent.php" method="post">
    			<select class="form-control" name="eventSelect">
    				<?php
    				$result = $mysqli->query("SELECT name, eventID FROM cadetEvent");
    				while($row = $result->fetch_assoc()) {
    					if ((isset($_POST['Export']) || isset($_POST['selectevent'])) && $_POST['eventSelect'] == $row['eventID']) {
    						echo '<option value="' . $row['eventID'] . '"  selected>'.$row['name'] . '</option>';
    					} else {
    						echo '<option value="' . $row['eventID'] . '">'.$row['name'] . '</option>';
    					}
    				}
    				?>
    			</select><br>
    			<button class="btn btn-sm btn-primary" type="submit" value="Submit" name="selectevent">View Attendees</button><br><br>
          <input class="btn btn-sm btn-primary" type="submit" name="Export" value="Export to Excel"/>
    			</form>
    		  </div>
      	</div>
      </div>
    </div>
</div>
</body>