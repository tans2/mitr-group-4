<?php include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if (isset($_POST['addcard'])) {
	if (isset($_POST['newrin']) && isset($_POST['newrfid'])) {
		$cadetrin = trim($_POST['newrin']);
		$cadetrfid = trim($_POST['newrfid']);

		$updatequery = 'UPDATE cadet SET `rfid` = ? WHERE `rin` = ?';
		$stmt = $mysqli->prepare($updatequery);
		$stmt->bind_param("ii", $cadetrfid, $cadetrin);
		$stmt->execute();
		$stmt->close();

		header('Location: attend.php');
	} else {
		echo '<script> alert(You must enter both a valid RIN and scan the ID card);</script>';
	}
}

?>

<head>
	<title>Cadet Events</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>

<body>
  <div class="jumbotron container-fluid">
	<h1 class="display-4"> Connect RFID </h1>
	<div class="card">
	  <div class="card-body">
		  <form action="connectrfid.php" method="post">
			RIN: <input class="form-control" type="text" name="newrin"/><br>
			Scan Card: <input class="form-control" type="text" name="newrfid"/><br>
			<input class="btn btn-primary btn-sm" type="submit" name="addcard" value="Submit"/>
		  </form>
	  </div>
  </div>
</body>