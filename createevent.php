<?php include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

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

<head>
	<title>Cadet Events</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>

<body>

	<div class="jumbotron">
		<h1 class="display-4"> Create an Event </h1>
	</div>

	<form action="createevent.php" method="post">
		Title: <input type="text" name="eventTitle"/>
		Date: <input type="date" name="eventDate"/>
		Mandatory: <input type="checkbox" name="mandatory" value="mandatory"/>
		<input type="submit" name="eventMade" value="Submit"/>
	</form>



</body>
