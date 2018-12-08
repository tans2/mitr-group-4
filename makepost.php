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
	
	//echo "<script type='text/javascript'>location.href='announcements.php';</script>";
	//header('Location: announcements.php');
}
?>

<body>
 <script>
              $(document).ready(function(){
                  $('#body').summernote({focus: true, toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['insert', ['link', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                  ] });
              });
            
             function saveBody() {
                document.getElementById('body').value = $('#body').summernote('code');
            };
          </script>
<style>
.note-popover .popover-content {
    display: none;
}
</style>
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
				<p class="card-text">Description: <textarea class="form-control" name="postBody" id="body"></textarea><br>
				<input class="btn btn-sm btn-primary" type="submit" name="postMade" value="Submit" onclick="saveBody()"/>
			</form>
	</div>

</body>

<?php include('./assets/inc/footer.php');