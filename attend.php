<?php
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


<!DOCTYPE html>


<html>
<head>
	<title>Cadet Events</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>

<body>
	<?php
		@ $db =  new mysqli('localhost', 'root', 'password', 'mitr');
		if (isset($_POST["eventSelect"])) {
			$query = 'SELECT name FROM cadetevent WHERE eventID = "' . $_POST["eventSelect"] . '"';
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			echo "<h1> Event: " . $row["name"] . "</h1>";
			$_SESSION["eventID"] = $_POST["eventSelect"];
		} else {
			$query = 'SELECT name FROM cadetevent WHERE eventID = "' . $_SESSION["eventID"] . '"';
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			echo "<h1> Event: " . $row["name"] . "</h1>";
		}
		if (isset($_POST["rin"])) {
			$query = 'SELECT firstName FROM cadet WHERE rin="' . $_POST["rin"] . '"';
			$result = $db->query($query);
			$row = $result->fetch_assoc();
			if (!$row) {
				echo "<p> RIN does not match any cadet.</p>";
			} else {
				echo "<p> " . $row["firstName"] . " has attended </p>";
				$insertquery = 'INSERT INTO attendance (`rin`, `eventid`, `attended`) VALUES (?,?,?)';
				$statement = $db->prepare($insertquery);
				$t = 1;
				$statement->bind_param("iii",$_POST["rin"], $_SESSION["eventID"], $t);
				$statement->execute();
				$statement->close();
			}
		}
	?>
	<form class="attend" action="attend.php" method="post">
		RIN: <br>
		<input type="text" name="rin">
		<input type="submit" value="Submit">
	</form>

	<form class="show_attendance" action="attend.php" method="post">
		<input type="submit" value="Show All Atendees" name="show_attendance"/>
	</form>
	<?php
		if (isset($_POST["show_attendance"])) {
			$query = 'SELECT rin FROM attendance WHERE eventid="' . $_SESSION["eventID"] .'"';
			$result = $db->query($query);
			while ($row = $result->fetch_assoc()) {
				$namequery = 'SELECT firstName FROM cadet WHERE rin="'.$row["rin"] . '"';
				$res2 = $db->query($namequery);
				$row2 = $res2->fetch_assoc();
				echo "<p>". $row2["firstName"] . "</p>";
			}
		}
	?>
</body>
</html>