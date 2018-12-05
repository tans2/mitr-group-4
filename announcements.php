<?php
include('./assets/inc/header.php');
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<body>
  <div class="jumbotron container-fluid">
	<h1 class="display-4"> Announcements </h1>
	<a class="btn btn-primary" role="button" href="makepost.php">Make an Announcement</a>
	<?php
	$query = 'SELECT * FROM announcement';
	$result = $mysqli->query($query);
      echo "<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>";
      echo "<table style='width:100%;'><tr><th>Title</th><th>Subject</th> <th>Announcement</th><th>Created By</th><th>Acknowledge</th></tr>";
	while ($row = $result->fetch_assoc()) {
		//print out the information for the post
		echo "<tr><td>" . $row['title'] . "</td>";
		echo "<td>" . $row['subject'] . "</td>";
        echo "<td>" . $row['body'] . "</td>";
		
		if (isset($_POST[$row['uid']])) {
			$insertquery = 'INSERT INTO acknowledge_posts (`rin`, `announcement_id`) VALUES (?,?)';
			$statement = $mysqli->prepare($insertquery);
			$statement->bind_param("ii",$_SESSION['rin'],$row['uid']);
			$statement->execute();
			$statement->close();
		}

        $poster = $mysqli->query('SELECT firstName, lastName FROM cadet WHERE rin="' . $row['createdBy'] . '"');
		$names = $poster->fetch_assoc();

		//print out the author of the post
		echo "<td>" . $names['firstName'] . ' ' . $names['lastName'] . "</td><td>";
        
		//make a button to read and understand post
		echo '<form class="acknowledge" action="announcements.php" method="post">';
		echo '<button class="btn btn-sm btn-primary" type="submit" name="' . $row['uid'] . '">Read and Understood</button>';
		$countquery = 'SELECT count(rin) as c FROM acknowledge_posts WHERE announcement_id="' . $row['uid'] . '"';

		$count = $mysqli->query($countquery);
		$c = $count->fetch_assoc();

		//print out the number of people that have read and understood the post
		//when it is clicked it prints out the list of people that have
		echo '<form action="announcements.php" method="post"><input type="submit"';
		echo'name="' . $row['uid'] . 'second' . '" value="'. $c['c'] .'"/></form>';

		$setstr = $row['uid'] . 'second';
		if (isset($_POST[$setstr])) {
			$readquery = 'SELECT firstName, lastName FROM acknowledge_posts a, cadet c WHERE c.rin = a.rin and a.announcement_id = ' . $row['uid'] . ';';
			$readres = $mysqli->query($readquery);
			while ($readrow = $readres->fetch_assoc()) {
				//print out the name of everyone who has clicked read and understood for this post
				echo $readrow['firstName'] . ' ' . $readrow['lastName'] . '<br>';
			}
		}
		echo "</td></tr><br>";
	}
    echo "</table>";
	?>
</div>
</body>

<?php include('./assets/inc/footer.php');