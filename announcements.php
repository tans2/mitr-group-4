<?php
include('./assets/inc/header.php');
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<body>
  <div class="jumbotron container-fluid">
	<h1 class="display-4"> Announcements </h1><br>
	<a class="btn btn-primary" role="button" href="makepost.php">Make an Announcement</a><br></br>
	<?php
	$query = 'SELECT * FROM announcement';
	$result = $mysqli->query($query);
      /* echo "<style>
table, thead, tbody, th, tr, td {
    border: 1px solid black;
    border-collapse: collapse;
}
</style>";
      echo "<table class='table table-bordered table-responsive' style='width:100%;'>
      <thead><tr>
      <th scope='col'>Title</th>
      <th scope='col'>Subject</th>
      <th scope='col'>Announcement</th>
      <th scope='col'>Created By</th>
      <th scope='col'>Acknowledge</th>
      </tr></thead><tbody>"; */ 
      echo "<div class='card'>";
	while ($row = $result->fetch_assoc()) {
		//print out the information for the post
		echo "<div class='card-header'>" . $row['title'] . "</div>";
		echo "<div class='card-body'><h5 class='card-title'>" . $row['subject'] . "</h5>";
        echo "<p class='card-text'>" . $row['body'] . "</p>";
		
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
		echo "<p class='card-text'>" . $names['firstName'] . ' ' . $names['lastName'] . "</p>";
        
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
		echo "</div>";
	}
    echo "</div>";
	?>
</div>
</body>

<?php include('./assets/inc/footer.php');