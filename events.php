<?php 
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
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
	<p>
		Select Event
		<form action="attend.php" method="post">
			<select name="eventSelect">
				<?php
				@ $db =  new mysqli('localhost', 'root', 'password', 'mitr');
				$result = $db->query("SELECT name, eventID FROM cadetevent");
				while($row = $result->fetch_assoc()) {
					echo '<option value="' . $row['eventID'] . '">'.$row['name'] . '</option>';
				}
				?>
			</select>
			<input type="submit" id="selectevent" value="Submit"/>
		</form>
	</p>
</body>
</html>

<?php include('./assets/inc/footer.php'); ?>