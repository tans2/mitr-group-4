<?php include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<head>
	<title>Cadet Events</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>

<body>

	<div class="jumbotron">
		<h1 class="display-4"> Events </h1>
	</div>

	<a href="createevent.php">Create an Event</a>

	<div class="card" style="width: 18rem;margin: auto;width: 30%;padding: 10px;">
	<p>
		Select Event to View Attendees
		<form action="attendance.php" method="post">
			<select name="eventSelect">
				<?php
				$result = $mysqli->query("SELECT name, eventID FROM cadetEvent");
				while($row = $result->fetch_assoc()) {
					if ((isset($_POST['Export']) || isset($_POST['selectevent'])) && $_POST['eventSelect'] == $row['eventID']) {
						echo '<option value="' . $row['eventID'] . '"  selected>'.$row['name'] . '</option>';
					} else {
						echo '<option value="' . $row['eventID'] . '">'.$row['name'] . '</option>';
					}
				}
				?>
			</select>
			<input type="submit" name="selectevent" value="Submit"/>
 <div>
            <form class="form-horizontal" action="attendance.php" method="post" name="upload_excel"   
                      enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="Export" class="btn btn-success" value="export to excel"/>
                            </div>
                   </div>                    
            </form>           
 </div>
		</form>
	</p>
	</div>
<?php
	if (isset($_POST["selectevent"])) {
		$eventquery = 'SELECT name, mandatory, date FROM cadetEvent WHERE eventID = "' . $_POST["eventSelect"] . '"';
		$eventresult = $mysqli->query($eventquery);
		$erow = $eventresult->fetch_assoc();
		echo $erow['name'] . ' ' . $erow['date'];
		if ($erow['mandatory']) {
			echo ' - MANDATORY';
		}
        $query = 'SELECT rin FROM attendance WHERE eventid="' . $_POST["eventSelect"] .'"';
        $result = $mysqli->query($query);
        echo "<table style='width:100%'><tr><th>Name</th><th>Flight</th><th>Event</th><th>Date</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $namequery = "SELECT lastName, flight, name, date FROM cadet, cadetEvent WHERE rin=" . $row['rin'] . " AND cadetEvent.eventID = " . $_POST["eventSelect"];
            $res2 = $mysqli->query($namequery);
            $row2 = $res2->fetch_assoc();
            echo "<tr>";
            echo "<td>Cadet ". $row2["lastName"] . "</td>";
            echo "<td>". $row2["flight"] . "</td>";
            echo "<td>". $row2["name"] . "</td>";
            echo "<td>". $row2["date"] . "</td>";
            echo "</tr>";
        }
        echo "</table>"; 
    }
    else
    {
         if(isset($_POST["Export"])){  
              $query = "SELECT firstName, lastName, flight, name, date FROM cadet, cadetEvent WHERE cadetEvent.eventID = " . $_POST["eventSelect"];
        $result = $mysqli->query($query);
             if(file_exists("assets/files/eventAttendance.csv"))
             {
                 unlink("assets/files/eventAttendance.csv");
             }
        $file = fopen("assets/files/eventAttendance.csv","w"); 
          fputcsv($file, array('First Name', 'Last Name', 'Flight', 'Event', 'Date'));  

        while ($row = $result->fetch_assoc()) {
            fputcsv($file, $row);
        }
            
          fclose($file);  
             echo "<a href='assets/files/eventAttendance.csv' target='_blank'>Download Attendance File</a>";
 }
    }
?>
</body>

<?php include('./assets/inc/footer.php'); ?>