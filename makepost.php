<?php
include('./assets/inc/header.php');
?>

<head>
  <title>Make Announcement</title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ij0h6vcxvcacvu1l56udgaairzb672xtq1kktiizh2cpf4fe"></script>
    <script src="assets/js/makepost.js"></script>
</head>
<body> 
	<div class="jumbotron container-fluid">
		<h1 class="display-4"> Make an Announcement </h1>
		<div class="card">
			<div class="card-body">
			<form class="makepost" action="sendpost.php" method="post">
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