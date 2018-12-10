<?php include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
  header('Location: index.php');
}

if (isset($_POST["eventMade"])) {
  $mandatory = 0;
  if (isset($_POST['mandatory'])) {
	$mandatory = 1;
  }
  $title = htmlspecialchars(trim($_POST['eventTitle']));
  $date = $_POST['eventDate'];
  $type = $_POST['type'];
  if($type == 'pt')
  {
    $pt = 1;
    $llab = null;
  }
  else if($type == 'llab')
  {
    $pt = null;
    $llab = 1;
  }
  else
  {
    $pt = null;
    $llab = null;
  }

  $insertquery = 'INSERT INTO cadetEvent (name, date, pt, llab) VALUES (?,?,?,?)';
  $stmt = $mysqli->prepare($insertquery);
  $stmt->bind_param("sdii", $title, $date, $pt, $llab);
  $stmt->execute();
  $stmt->close();

  header('Location: attendance.php');
}
?>

<head>
	<title>Create Events</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>

<body>
	<div class="jumbotron container-fluid">
	  <h1 class="display-4"> Create an Event </h1>
	  <div class="card">
	  	<div class="card-body">
		  <form action="createevent.php" method="post">
			Title: <input class="form-control" type="text" name="eventTitle"/>
			Date: <input class="form-control" type="date" name="eventDate"/>
			Mandatory: <input type="checkbox" name="mandatory" value="mandatory"/><br></br>
			<input class="btn btn-sm btn-primary" type="submit" name="eventMade" value="Submit"/>
		  </form>
	  </div>
	</div>
</body>
