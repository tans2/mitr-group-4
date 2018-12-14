<?php
include('assets/inc/dbinfo.php');
if (isset($_POST["selectevent"])) 
{
    echo '<br></br>';
    $eventquery = 'SELECT name, pt, llab, date FROM cadetEvent WHERE eventID = "' . $_POST["eventSelect"] . '"';
    $eventresult = $mysqli->query($eventquery);
    $erow = $eventresult->fetch_assoc();
    echo $erow['name'] . ' ' . $erow['date'];
    if ($erow['pt'] || $erow['llab']) {
        echo ' - MANDATORY';
    }
    $query = 'SELECT rin FROM attendance WHERE eventid="' . $_POST["eventSelect"] .'"';
    $result = $mysqli->query($query);
    echo "<table style='width:100%'><tr><th>Name</th><th>Flight</th><th>Event</th><th>Date</th></tr>";
    while ($row = $result->fetch_assoc()) {
        $namequery = "SELECT lastName, flight, name, time FROM cadet, cadetEvent, attendance WHERE cadet.rin=" . $row['rin'] . " AND cadetEvent.eventID = " . $_POST["eventSelect"] . " AND cadet.rin = attendance.rin";
        $res2 = $mysqli->query($namequery);
        $row2 = $res2->fetch_assoc();
        echo "<tr>";
        echo "<td>Cadet ". $row2["lastName"] . "</td>";
        echo "<td>". $row2["flight"] . "</td>";
        echo "<td>". $row2["name"] . "</td>";
        echo "<td>". $row2["time"] . "</td>";
        echo "</tr>";
    }
    echo "</table>"; 
}
else
{
    if(isset($_POST["Export"]))
    {  
        $query = "SELECT firstName, lastName, flight, name, excused_absence, time FROM cadet, cadetEvent, attendance WHERE cadet.rin = attendance.rin AND attendance.eventid = cadetEvent.eventID AND attendance.eventid = " . $_POST["eventSelect"];
         $result = $mysqli->query($query);
         if(file_exists("assets/files/eventAttendance.csv"))
         {
             unlink("assets/files/eventAttendance.csv");
         }
        $file = fopen("assets/files/eventAttendance.csv","w"); 
          fputcsv($file, array('First Name', 'Last Name', 'Flight', 'Event', 'Excused', 'Time'));  
    if($result->num_rows > 0)
    {
         while ($row = $result->fetch_assoc()) 
         {
            fputcsv($file, $row);
         }
    }

    fclose($file);  

    if (file_exists("assets/files/eventAttendance.csv")) 
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename("assets/files/eventAttendance.csv").'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize("assets/files/eventAttendance.csv"));
        readfile("assets/files/eventAttendance.csv");
        exit;
    }
         echo "<a class='btn btn-primary btn-sm' href='assets/files/eventAttendance.csv' target='_blank'>Download Attendance File</a>";
    }
}
?>