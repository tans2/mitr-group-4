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