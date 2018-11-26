<?php
include('./assets/inc/header.php');
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<body>

	<div class="jumbotron">
		<h1 class="display-4"> Announcements </h1>
	</div>

	<?php
	$query = 'SELECT * FROM announcement ORDER BY posted_on DESC';
	$result = $mysqli->query($query);
	while ($row = $result->fetch_assoc()) {
		echo $row['title'];
		echo $row['subject'];
		echo $row['body'];
		$poster = $mysqli->query('SELECT firstName, lastName FROM cadet WHERE rin="' . $row['rin'] . '"');
		$names = $poster->fetch_assoc();
		echo $names['firstName'] . ' ' . $names['lastName'];
		echo '<form class="acknowledge" action="announcements.php" method="post">';
		echo '<button type="submit" name="' . $row['uid'] . '">Read and Understood</button>';


	}
	?>

</body>

<?php include('./assets/inc/footer.php');