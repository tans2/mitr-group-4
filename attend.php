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
	<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
	<p>
		Select Event
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
			<input type="submit" id="selectevent" value="Submit"/>
		</form>
	</p>
	</div>

	<?php
		if (isset($_POST["eventSelect"])) {
			$query = 'SELECT name FROM cadetEvent WHERE eventID = "' . $_POST["eventSelect"] . '"';
			$result = $mysqli->query($query);
			$row = $result->fetch_assoc();
			echo "<h1> Event: " . $row["name"] . "</h1>";
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
			$query = 'SELECT firstName FROM cadet WHERE rin=?';
			$result = $mysqli->prepare($query);
			$result->bind_param("i", $_POST['rin']);
			$result->execute();
			$result->bind_result($fname);
			if (!$result->fetch()) {
				echo "<p> RIN does not match any cadet.</p>";
				$result->close();
			} else {
				$result->close();
				echo "<p> " . $fname . " has attended </p>";
				$insertquery = 'INSERT INTO attendance (`rin`, `eventid`) VALUES (?,?)';
				$statement = $mysqli->prepare($insertquery);
				$statement->bind_param("ii",$_POST["rin"], $_SESSION["eventID"]);
				$statement->execute();
				$statement->close();
			}
		}


		if (isset($_SESSION['eventID'])) {
			echo '<form class="attend" action="attend.php" method="post">';
			echo 'Scan RPI ID Card: <input type="text" name="rfid" autofocus><br>';
			echo '<input type="submit" value="Submit">';
			echo '</form>';
			echo '<form class="attend" action="attend.php" method="post">';
			echo 'No RFID Scanner? Enter RIN: <input type="text" name="rin"> <br>';
			echo '<input type="submit" value="Submit">';
			echo '</form>';

			echo '<form class="show_attendance" action="attend.php" method="post">';
			echo '<input type="submit" value="Show All Atendees" name="show_attendance"/>';
			echo '</form>';
		}


		if (isset($_POST["show_attendance"])) {
			$query = 'SELECT rin FROM attendance WHERE eventid="' . $_SESSION["eventID"] .'"';
			$result = $mysqli->query($query);
			while ($row = $result->fetch_assoc()) {
				$namequery = 'SELECT firstName FROM cadet WHERE rin="'.$row["rin"] . '"';
				$res2 = $mysqli->query($namequery);
				$row2 = $res2->fetch_assoc();
				echo "<p>". $row2["firstName"] . "</p>";
			}
		}
	?>

	<a href="connectrfid.php">Add an ID card to a cadet</a>
</body>