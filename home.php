<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>


  <div class="jumbotron jumbotron-fluid">
    <h1 class="display-4"> Hello! </h1>
    <div class="row">
      <div class="col-4">
	    <div class="card" style="width:100%">
  		  <div class="card-header">
    		Events
  		  </div>
  		<?php $sql = "SELECT * FROM `cadetEvent` ORDER BY date DESC LIMIT 5";
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
            <?php $sql = "SELECT * FROM cadetEvent";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $sum = 0;
                        $attend = 0;
                        while($row = $result->fetch_assoc()) 
                        {
                            if(strpos($row['name'], 'LLAB') !== false || strpos($row['name'], 'llab') !== false)
                            {
                                $sum = $sum + 1;
                                $sql = "SELECT * FROM `attendance` WHERE eventid = ?";
                                $stmt = $mysqli->prepare($sql);
                                $stmt->bind_param("i", $row['eventID']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while($row = $result->fetch_assoc())
                                {
                                    if($row['rin'] == $_SESSION['rin'])
                                    {
                                        $attend = $attend + 1;
                                    }
                                }
                            }
                        }
                        if($sum != 0)
                        {
                           $perc = (($attend / $sum) * 100); 
                        }
                        else
                        {
                            $perc = 100;
                        }            
            ?>
    		<p class="card-text">Attendance: <?php echo $perc; ?>%</p>
        <h5 class="card-title">PT</h5>
            <?php $sql = "SELECT * FROM `cadetEvent`";
                        $stmt = $mysqli->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $sum = 0;
                        $attend = 0;
                        while($row = $result->fetch_assoc()) 
                        {
                            if(strpos($row['name'], 'PT') !== false)
                            {
                                $sum = $sum + 1;
                                $sql = "SELECT * FROM `attendance` WHERE eventid = ?";
                                $stmt = $mysqli->prepare($sql);
                                $stmt->bind_param("i", $row['eventID']);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                while($row = $result->fetch_assoc())
                                {
                                    if($row['rin'] == $_SESSION['rin'])
                                    {
                                        $attend = $attend + 1;
                                    }
                                }
                            }
                        }
                        if($sum != 0)
                        {
                           $perc = (($attend / $sum) * 100); 
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

<?php include('./assets/inc/footer.php'); ?>
