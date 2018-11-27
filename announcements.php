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

	<a href="makepost.php">Make an Announcement</a>

	<?php
	$query = 'SELECT * FROM announcement';
	$result = $mysqli->query($query);
	while ($row = $result->fetch_assoc()) {
		echo $row['title'];
		echo $row['subject'];
		echo $row['body'];
		if (isset($_POST[$row['uid']])) {
			$insertquery = 'INSERT INTO acknowledge_posts (`rin`, `announcement_id`) VALUES (?,?)';
			$statement = $mysqli->prepare($insertquery);
			$statement->bind_param("ii",$_SESSION['rin'],$row['uid']);
			$statement->execute();
			$statement->close();
		}
		$poster = $mysqli->query('SELECT firstName, lastName FROM cadet WHERE rin="' . $row['createdBy'] . '"');
		$names = $poster->fetch_assoc();
		echo $names['firstName'] . ' ' . $names['lastName'];
		echo '<form class="acknowledge" action="announcements.php" method="post">';
		echo '<button type="submit" name="' . $row['uid'] . '">Read and Understood</button>';
		$countquery = 'SELECT count(rin) as c FROM acknowledge_posts WHERE announcement_id="' . $row['uid'] . '"';
		$count = $mysqli->query($countquery);
		$c = $count->fetch_assoc();
		echo $c['c'];

	}
	?>

</body>

<?php include('./assets/inc/footer.php');