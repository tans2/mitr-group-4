<?php 
include('./assets/inc/header.php');
?>
<style>
/* Styles for mobile */
@media (max-width: 450px) 
{
    .card
    {
        width:95%;
    }
    body
    {
        min-width: 400px;
    }
}
</style>
<?php
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
  header('Location: index.php');
}

echo "<head><title>Cadet Directory</title></head>";
?>

<div class=\"jumbotron container-fluid\">
    <h1 class=\"display-4\"> Detachment Directory </h1><br>
<form action="directory.php" method="post">
    <select class="form-control" name="showcadets">
<?php
$result = $mysqli->query("SELECT major FROM cadet");
$options = array();
while($row = $result->fetch_assoc()) 
{
    if(!in_array($row['major'], $options) && strcmp("", $row['major']) != 0)
    {
       array_push($options, $row['major']);
    } 
}
?>
        <option value="all"  selected>All</option>';
<?php
foreach( $options as $option )
{
    echo '<option value="' . $option . '">'. $option . '</option>';
}
?>
    </select><br>
    <button class="btn btn-sm btn-primary" type="submit" value="Submit" name="submit">Show Cadets</button><br><br>

    </form>


    
<?php
if(!isset($_POST['showcadets']) || strcmp($_POST['showcadets'], "all") == 0)
{
    $stmt = $mysqli->prepare("SELECT * FROM cadet ORDER BY lastName");
}
else
{
    $stmt = $mysqli->prepare("SELECT * FROM cadet WHERE major = '" . $_POST['showcadets'] . "' ORDER BY lastName");
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc())
{
  if(file_exists("./assets/images/". $row['rin'] . ".jpg"))
    {
      $file = "assets/images/". $row['rin'] . ".jpg";
    }
  else
    {
      $file = "assets/images/default.jpeg";
    }
    echo "<div class=\"card\" style=\"display:inline-block;text-align:center;\">";
    // This needs to be fixed with cadet's picture
    echo "  <img class=\"img-fluid\" style='padding:5px;height:200px;width:200px;' src=\"" . $file . "\" alt=\"Cadet Profile Picture\">";
    echo "<div class=\"card-body\">";
    if(strpos($row['rank'], "AS") !== false)
    {
        echo "<h5 class=\"card-title\">Cadet " . $row['lastName'] . "</h5>";
    }
    else if(strpos($row['rank'], "None") !== false)
    {
        echo "<h5 class=\"card-title\"> " . $row['firstName'] . " " . $row['lastName'] . "</h5>";
    }
    else
    {
        echo "<h5 class=\"card-title\">" . $row['rank'] . " " . $row['lastName'] . "</h5>";
    }
    echo "<p class=\"card-text\"><strong>Rank: </strong>" . $row['rank'] . "<br><strong>Flight: </strong>" . $row['flight'] . "</p>";
    echo "<a href='viewprofile.php?rin=" . $row['rin'] . "' class=\"btn btn-sm btn-primary\">View Profile</a></div></div>";
}
?>
