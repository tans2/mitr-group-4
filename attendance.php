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
	</div>

	<a href="createevent.php">Create an Event</a>

	<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
	<p>
		Select Event to View Attendees
		<form action="attendance.php" method="post">
			<select name="eventSelect">
				<?php
				$result = $mysqli->query("SELECT name, eventID FROM cadetevent");
				while($row = $result->fetch_assoc()) {
					if (isset($_POST['selectevent']) && $_POST['eventSelect'] == $row['eventID']) {
						echo '<option value="' . $row['eventID'] . '" selected>'.$row['name'] . '</option>';
					} else {
						echo '<option value="' . $row['eventID'] . '">'.$row['name'] . '</option>';
					}
				}
				?>
			</select>
			<input type="submit" name="selectevent" value="Submit"/>
		</form>
	</p>
	</div>
	<?php
	if (isset($_POST["selectevent"])) {
		$eventquery = 'SELECT name, mandatory, date FROM cadetevent WHERE eventID = "' . $_POST["eventSelect"] . '"';
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