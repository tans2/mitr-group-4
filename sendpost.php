<?php
require_once "vendor/autoload.php";
include('./assets/inc/header.php');
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if (isset($_POST['postMade'])) {
	$title = Html2Text\Html2Text::convert($_POST['postTitle']);
	$subject = Html2Text\Html2Text::convert($_POST['postSubject']);
	$body = $_POST['postBody'];
	$author = htmlspecialchars(trim($_SESSION['rin']));

	$insquery = 'INSERT INTO announcement (`title`, `subject`, `body`, `createdBy`, `date`, `uid`) VALUES (?,?,?,?,CURRENT_TIMESTAMP, NULL)';
	$stmt = $mysqli->prepare($insquery);
	$stmt->bind_param("sssi", $title, $subject, $body, $author);
	$stmt->execute();
	$stmt->close();

	include("emailPHP.php");
	if(isset($_POST["groups"]) && !in_array("null", $_POST["groups"])){
		$query = 'SELECT primaryEmail AS email FROM (cadet LEFT JOIN groupMember ON cadet.rin = groupMember.rin) LEFT JOIN cadetGroup ON groupMember.groupID = cadetGroup.id WHERE cadetGroup.label = ?';
		$stmt = $mysqli->prepare($query);
		$size = count($_POST["groups"]);
		for($x = 0; $x < $size; $x++) { 
			$stmt->bind_param("s", $_POST['groups'][$x]);
			$stmt->execute();
			$result = $stmt->get_result();
			while ($row = $result->fetch_assoc()){
				$targets[] = $row['email'];
			}
		}
		$emailSubject = $title . ": " . $subject;
		$poster = $mysqli->query('SELECT firstName, lastName FROM cadet WHERE rin="' . $author . '"');
		$postername = $poster->fetch_assoc();
		$emailBody = $body . "<br>&nbsp;<br>" . "Created by:<br>" . $postername['firstName'] . " " . $postername['lastName'] . "<br>" . $author;
		
		send($targets, $emailSubject, $emailBody);
	}
	echo "<script>window.location.href = 'announcements.php';</script>";
}
?>