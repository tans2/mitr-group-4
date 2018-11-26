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

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

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