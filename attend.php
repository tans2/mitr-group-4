<?php
include('./assets/inc/header.php');
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
  <div class="jumbotron container-fluid">
	<h1 class="display-4"> Attendance </h1><br>
	<div class="card" style="margin: auto;width: 30%;padding: 10px;">
	<h5 class="card-title">Select Event</h5>
		<form action="attend.php" method="post">
			<select name="eventSelect">
				<?php
				$result = $mysqli->query("SELECT name, eventID FROM cadetEvent");
				while($row = $result->fetch_assoc()) {
				    if (isset($_POST['eventSelect']) && $_POST['eventSelect'] == $row['eventID']) {
						echo '<option value="' . $row['eventID'] . '"  selected>'.$row['name'] . '</option>';
					} else {
						echo '<option value="' . $row['eventID'] . '">'.$row['name'] . '</option>';
					}
				}
                
				?>
			</select>
			<input class="btn btn-sm btn-primary" type="submit" id="selectevent" value="Submit"/>
		</form>
	</div>

	<?php
		if (isset($_POST["eventSelect"])) {
			$query = 'SELECT name FROM cadetEvent WHERE eventID = "' . $_POST["eventSelect"] . '"';
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			echo "<h3 class='h3'> Event: " . $row["name"] . "</h3>";
			$_SESSION["eventID"] = $_POST["eventSelect"];
		} else if (isset($_SESSION['eventID'])) {
			$query = 'SELECT name FROM cadetEvent WHERE eventID = "' . $_SESSION["eventID"] . '"';
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			echo "<h1> Event: " . $row["name"] . "</h1>";
		}
		if (isset($_POST['rfid'])) {
			$query = 'SELECT rin, firstName FROM cadet WHERE rfid=?';
			$selectstmt = $mysqli->prepare($query);
			$selectstmt->bind_param("i", $_POST['rfid']);
			$selectstmt->execute();
			$selectstmt->bind_result($cadetrin, $fname);
			if (!$selectstmt->fetch()){
				$selectstmt->close();
				echo 'This ID card does not match any cadet. Click <a href="connectrfid.php">here</a> to connect this card to a cadet.';
			} else {
				$selectstmt->close();
				echo '<p> ' . $fname . ' has attended </p>';
				$insertquery = 'INSERT INTO attendance (`rin`, `eventid`) VALUES (?,?)';
				$statement = $mysqli->prepare($insertquery);
				$statement->bind_param("ii", $cadetrin, $_SESSION['eventID']);
				$statement->execute();
				$statement->close();
			}
		}
		else if (isset($_POST["rin"])) {
			$query = 'SELECT lastName FROM cadet WHERE rin=?';
			$result = $mysqli->prepare($query);
			$result->bind_param("i", $_POST['rin']);
			$result->execute();
			$result->bind_result($lname);
			if (!$result->fetch()) {
				echo "<p> RIN does not match any cadet.</p>";
				$result->close();
			} else {
				$result->close();
				echo "<p>Cadet " . $lname . " has attended </p>";
				$insertquery = 'INSERT INTO attendance (`rin`, `eventid`) VALUES (?,?)';
				$statement = $mysqli->prepare($insertquery);
				$statement->bind_param("ii",$_POST["rin"], $_SESSION["eventID"]);
				$statement->execute();
				$statement->close();
			}
		}

		if (isset($_SESSION['eventID'])) {
			echo '<form class="attend" action="attend.php" method="post">';
			echo 'Scan RPI ID Card: <input class="form-control" type="text" name="rfid" autofocus><br>';
			echo '<input class="btn btn-sm btn-primary" type="submit" value="Submit">';
			echo '</form><br>';
			echo '<form class="attend" action="attend.php" method="post">';
			echo 'No RFID Scanner? Enter RIN: <input class="form-control" type="text" name="rin"> <br>';
			echo '<input class="btn btn-sm btn-primary" type="submit" value="Submit">';
			echo '</form><br>';

			echo '<form class="show_attendance" action="attend.php" method="post">';
			echo '<input class="btn btn-sm btn-primary" type="submit" value="Show All Atendees" name="show_attendance"/>';
			echo '</form><br>';
			echo '<a class="btn btn-sm btn-primary" href="connectrfid.php">Add Cadet ID Card</a>';
		}

		if (isset($_POST["show_attendance"])) {
			$query = 'SELECT rin FROM attendance WHERE eventid="' . $_SESSION["eventID"] .'"';
			$result = $mysqli->query($query);
            echo "<table style='width:100%'><tr><th>Name</th><th>Flight</th><th>Event</th><th>Date</th></tr>";
			while ($row = $result->fetch_assoc()) {
				$namequery = "SELECT lastName, flight, name, date FROM cadet, cadetEvent WHERE rin=" . $row['rin'] . " AND cadetEvent.eventID = " . $_SESSION['eventID'];
				$res2 = $mysqli->query($namequery);
				$row2 = $res2->fetch_assoc();
                echo "<tr>";
				echo "<td>Cadet ". $row2["lastName"] . "</td>";
                echo "<td>". $row2["flight"] . "</td>";
                echo "<td>". $row2["name"] . "</td>";
                echo "<td>". $row2["date"] . "</td>";
                echo "</tr>";
			}
            echo "</table>"; 
		}
	?>

</body>