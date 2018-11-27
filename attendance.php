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
		<h1 class="display-4"> Attendance </h1>
	</div>
	<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
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
	</div>

</body>

<?php include('./assets/inc/footer.php'); ?>