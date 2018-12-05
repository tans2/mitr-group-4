<?php
include('./assets/inc/header.php');
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if (isset($_POST['postMade'])) {
	$title = htmlspecialchars(trim($_POST['postTitle']));
	$subject = htmlspecialchars(trim($_POST['postSubject']));
	$body = htmlspecialchars(trim($_POST['postBody']));
	$author = htmlspecialchars(trim($_SESSION['rin']));

	$insquery = 'INSERT INTO announcement (`title`, `subject`, `body`, `createdBy`, `date`, `uid`) VALUES (?,?,?,?,CURRENT_TIMESTAMP, NULL)';
	$stmt = $mysqli->prepare($insquery);
	$stmt->bind_param("sssi", $title, $subject, $body, $author);
	$stmt->execute();
	$stmt->close();

	include("emailPHP.php");

	$sql = "SELECT primaryEmail, secondaryEmail FROM (cadet LEFT JOIN groupmember ON cadet.rin = groupmember.rin) LEFT JOIN cadetgroup ON groupmember.groupID = cadetgroup.id WHERE groupID IS NOT NULL;";
	$stmt = $mysqli->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while($row = $result->fetch_assoc()) {
		if(!is_null($row["primaryEmail"])){
			$targets[] = $row["primaryEmail"];
		} else if (!is_null($row["secondaryEmail"])) {
			$targets[] = $row["secondaryEmail"];
		}
	}
	$emailSubject = $title . ": " . $subject;
	$poster = $mysqli->query('SELECT firstName, lastName FROM cadet WHERE rin="' . $author . '"');
	$postername = $poster->fetch_assoc();
	$emailBody = $body . "<br>&nbsp;<br>" . "Created by:<br>" . $postername['firstName'] . " " . $postername['lastName'] . "<br>" . $author;
	
	send($targets, $emailSubject, $emailBody); 

	echo "<script type='text/javascript'>location.href='announcements.php';</script>";
	//header('Location: announcements.php');
}
?>

<body>

	<div class="jumbotron container-fluid">
		<h1 class="display-4"> Make an Announcement </h1>
		<div class="card">
			<div class="card-body">
			<form class="makepost" action="makepost.php" method="post">
				<p class="card-text">Title: <input class="form-control" type="text" name="postTitle"/>
				<p class="card-text">Subject: <input class="form-control" type="text" name="postSubject"/>
				<p class="card-text">Description: <textarea class="form-control" name="postBody"></textarea><br>
				<input class="btn btn-sm btn-primary" type="submit" name="postMade" value="Submit"/>
			</form>
	</div>

</body>

<?php include('./assets/inc/footer.php');