
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Home</title>
    <link href='https://fonts.googleapis.com/css?family=Cabin' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <?php
include('assets/inc/dbinfo.php');

?>
    
    <div class="jumbotron container-fluid">
  <div class="container">
    <h1 class="display-4">Security Question</h1>
    <div style="width:90%;display:block;margin-left:auto;margin-right:auto;" class="card" id="Edit Groups">
      <div class="card-body">
        
        <form id="makegroup" method="POST" name="security" action="forgotpass.php">
      
          <strong>
        <?php 
            if(isset($_POST['rin']))
            {
                $rin = $_POST['rin'];
                $_SESSION['resetrin'] = $rin;

                $stmt = $mysqli->prepare("SELECT * FROM cadet WHERE rin = ?");
                $stmt->bind_param( "i", $rin);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($row = $result->fetch_assoc())
                {
                    echo "<h4>Security Question:</h4>";
                    echo "RIN: <input type='text' style='hidden:true;' name='rin' id='rin' value='" . $row['rin'] . "' readonly><br><br>";
                    echo $row['question'];
                    echo "<br><br><h4 class='card-text'>Response:</h4>";
                }
            } 
              ?></strong>
          
          <input type="text" style="width:100%;" name="answer" id="answer"><br><br>
            
          <button class="btn btn-sm btn-primary" type="submit" name="submit">Submit</button>
        </form><br>
    </div>
</div>
