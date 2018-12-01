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

<body>
  <div class="jumbotron">
  	<h1 class="display-4"> Events </h1>
  	<div class="container">
      <div class="row">
        <div class="col-6">
		  <div class="card" style="margin: auto;width: 50%;padding: 10px;">
		  	<?php 
			  if (isset($_POST["eventMade"])) {
				$mandatory = 0;
			  if (isset($_POST['mandatory'])) {
				$mandatory = 1;
			  }
			  $title = htmlspecialchars(trim($_POST['eventTitle']));
			  $date = $_POST['eventDate'];

			  $insertquery = 'INSERT INTO cadetEvent (`name`, `mandatory`, `date`) VALUES (?,?,?)';
			  $stmt = $mysqli->prepare($insertquery);
			  $stmt->bind_param("sis", $title, $mandatory, $date);
			  $stmt->execute();
			  $stmt->close();

			  header('Location: attendance.php');
			  }
			?>
		    <h5 class="card-title">Create an Event</h5>
		    <form action="createevent.php" method="post">
			  <label for=title><b>Title: </b></label><br><input type="text" name="eventTitle" style="border-width:3px;"/><br>
			  <label for=date><b>Date: </b></label><br><input type="date" name="eventDate" style="border-width:3px;"/><br>
			  <label for=mandatory><b>Mandatory: </b></label><input type="checkbox" name="mandatory" value="mandatory"/><br>
			  <button class="btn btn-sm btn-primary" type="submit" value="Submit" name="eventMade">Submit</button>
			</form>
		  </div>
		</div>
		
		<div class="col-6">
	      <div class="card" style="margin: auto;width: 50%;padding: 10px;">
			<h5 class="card-title"> Select Event to View Attendees</h5>
			<form action="attendance.php" method="post">
			<select name="eventSelect">
				<?php
				$result = $mysqli->query("SELECT name, eventID FROM cadetEvent");
				while($row = $result->fetch_assoc()) {
					if (isset($_POST['selectevent']) && $_POST['eventSelect'] == $row['eventID']) {
						echo '<option value="' . $row['eventID'] . '"  selected>'.$row['name'] . '</option>';
					} else {
						echo '<option value="' . $row['eventID'] . '">'.$row['name'] . '</option>';
					}
				}
				?>
			</select>
			<button class="btn btn-sm btn-primary" type="submit" value="Submit" name="selectevent">Submit</button>
			</form>
		  </div>
  		</div>
  	  </div>
    </div>
  </div>
	<?php
	if (isset($_POST["selectevent"])) {
		$eventquery = 'SELECT name, mandatory, date FROM cadetEvent WHERE eventID = "' . $_POST["eventSelect"] . '"';
		$eventresult = $mysqli->query($eventquery);
		$erow = $eventresult->fetch_assoc();
		echo $erow['name'] . ' ' . $erow['date'];
		if ($erow['mandatory']) {
			echo ' - MANDATORY';
		}
		
		$query = 'SELECT rin FROM attendance WHERE eventid="' . $_POST["eventSelect"] .'"';
		$result = $mysqli->query($query);
		while ($row = $result->fetch_assoc()) {
			$namequery = 'SELECT firstName, lastName FROM cadet WHERE rin="'.$row["rin"] . '"';
			$res2 = $mysqli->query($namequery);
			$row2 = $res2->fetch_assoc();
			echo "<p>". $row2["firstName"] . ' ' . $row2['lastName'] . "</p>";
		}
	}
	?>
</body>

<?php include('./assets/inc/footer.php'); ?>