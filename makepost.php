<?php
include('./assets/inc/header.php');
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if (isset($_POST['postMade'])) {
	$title = $_POST['postTitle'];
	$subject = $_POST['postSubject'];
	$body = $_POST['postBody'];
	$author = $_SESSION['rin'];

	$insquery = 'INSERT INTO announcement (`title`, `subject`, `body`, `createdBy`) VALUES (?,?,?,?)';
	$stmt = $mysqli->prepare($insquery);
	$stmt->bind_param("sssi", $title, $subject, $body, $author);
	$stmt->execute();
	$stmt->close();

	header('Location: announcements.php');
}
?>

<body>

	<div class="jumbotron">
		<h1 class="display-4"> Make an Announcement </h1>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<form class="makepost" action="makepost.php" method="post">
		Title: <input type="text" name="postTitle"/>
		Subject: <input type="text" name="postSubject"/>
		Description: <textarea rows="10" cols="30" name="postBody"></textarea>
		<input type="submit" name="postMade" value="Submit"/>
	</form>

</body>

<?php include('./assets/inc/footer.php');