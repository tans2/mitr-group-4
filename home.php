<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<style>

/* Styles for mobile */
@media (max-width: 500px) 
{
    .col-4 
    {
        -ms-flex: 90%;
        flex: 90%;
        max-width: 95%;
        padding: 10px;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    body
    {
        min-width: 400px;
    }
}
@media (min-width: 500px) 
{
    .col-4 
    {
        -ms-flex: 0 0 33.333333%;
        flex: 0 0 33.333333%;
        max-width: 33.333333%;
    }
}
</style>

  <div class="jumbotron jumbotron-fluid">
    <h1 class="display-4"> Hello! </h1>
    <div class="row">
      <div class="col-4">
	    <div class="card" style="width:100%">
  		  <div class="card-header">
    		Events
  		  </div>
  		<?php $sql = "SELECT * FROM cadetEvent ORDER BY ABS( DATEDIFF( cadetEvent.date, NOW() ) ) LIMIT 5";
        $stmt = $mysqli->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc())
        {
            echo "<div class=\"card-body\">";
    		echo "<h5 class=\"card-title\">" . $row['name'] . "</h5>";
    		echo "<p class=\"card-text\">" . $row['date'] . "</p>";
    		echo "<a href='attendance.php?eventid=" . $row['eventID'] . "' class=\"btn btn-sm btn-primary\">View</a></div>";
  		
        } ?>
	   </div>
      </div>

    <div class="col-4">
      <div class="card" style="width:100%">
        <div class="card-header">
            Announcements
        </div>
            <?php
            $query = 'SELECT a.title, a.subject, c.firstName, c.lastName FROM announcement a, cadet c WHERE a.createdBy = c.rin ORDER BY date DESC LIMIT 5;';
            $stmt = $mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc()) {
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['title'] . '</h5>';
                echo "<p class='card-text'> " . $row['subject'] . '</p>';
                echo "<p class='card-text'>" . $row['firstName'] . ' ' . $row['lastName'] . '</p></div>';
            }
            ?>
      </div>
    </div>

    <div class="col-4">
	  <div class="card" style="width:100%">
  		<div class="card-header">
    		Status
  		</div>
  		<div class="card-body">
        <h5 class="card-title">Leadership Labs</h5>
            <?php 
                        $sql = "SELECT * FROM cadetEvent WHERE llab = 1";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $sum = mysqli_num_rows($result);
            
                        $sql = "SELECT * FROM attendance, cadetEvent WHERE attendance.eventid = cadetEvent.eventID AND rin = ? AND llab = 1";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param("i", $_SESSION['rin']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $attend = mysqli_num_rows($result);
                            
                        if($sum != 0)
                        {
                           $perc = number_format( (($attend / $sum) * 100), 2 ); 
                        }
                        else
                        {
                            $perc = 100;
                        }       
            ?>
    		<p class="card-text">Attendance: <?php echo $perc; ?>%</p>
        <h5 class="card-title">PT</h5>
            <?php $sql = "SELECT * FROM cadetEvent WHERE pt = 1";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $sum = mysqli_num_rows($result);
            
                        $sql = "SELECT * FROM attendance, cadetEvent WHERE attendance.eventid = cadetEvent.eventID AND rin = ? AND pt = 1";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param("i", $_SESSION['rin']);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $attend = mysqli_num_rows($result);
                            
                        if($sum != 0)
                        {
                           $perc = number_format( (($attend / $sum) * 100), 2 ); 
                        }
                        else
                        {
                            $perc = 100;
                        }   
                         ?>
        <p class="card-text">Attendance: <?php echo $perc; ?>%</p>
    		<a href="attendance.php" class="btn btn-sm btn-primary">View</a>
  		</div>
      </div>
    </div>
