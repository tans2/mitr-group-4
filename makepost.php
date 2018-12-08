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
	if(!isset($_POST["groups"]) || in_array("null", $_POST["groups"])){
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
		} else {
			$sql = "SELECT primaryEmail, secondaryEmail FROM (cadet LEFT JOIN groupMember ON cadet.rin = groupMember.rin) LEFT JOIN cadetGroup ON groupMember.groupID = cadetGroup.id WHERE groupID IS NOT NULL;";
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
		}
	}
	
	$emailSubject = $title . ": " . $subject;
	$poster = $mysqli->query('SELECT firstName, lastName FROM cadet WHERE rin="' . $author . '"');
	$postername = $poster->fetch_assoc();
	$emailBody = $body . "<br>&nbsp;<br>" . "Created by:<br>" . $postername['firstName'] . " " . $postername['lastName'] . "<br>" . $author;
	
	send($targets, $emailSubject, $emailBody); 

	//echo "<script type='text/javascript'>location.href='announcements.php';</script>";
	//header('Location: announcements.php');
}
?>

<body>

	<div class="jumbotron container-fluid">
		<h1 class="display-4"> Make an Announcement </h1>
		<div class="card">
			<div class="card-body">
			<form class="makepost" action="makepost.php" method="post">
				<label class="card-text" for="address">Groups to notify (Ctl/Command Click to multiselect)</label><br>
				<select id="grouplist" class="form-control" name="groups[]" multiple>
				<option value="null">No Groups [Default]</option>
				<?php
					$query = 'SELECT label FROM cadetGroup';
					$stmt = $mysqli->prepare($query);
					$stmt->execute();
					$result = $stmt->get_result();
					while ($row = $result->fetch_assoc()) {
						echo "<option value = '" . $row['label'] . "'>" . $row['label'] . "</option>";
					}
				?>
				</select><br>
				<p class="card-text">Title: <input class="form-control" type="text" name="postTitle"/>
				<p class="card-text">Subject: <input class="form-control" type="text" name="postSubject"/>
				<p class="card-text">Description: <textarea class="form-control" name="postBody"></textarea><br>
				<input class="btn btn-sm btn-primary" type="submit" name="postMade" value="Submit"/>
			</form>
	</div>

</body>

<?php include('./assets/inc/footer.php');