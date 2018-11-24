<?php 
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

$stmt = $mysqli->prepare("SELECT * FROM cadet");
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
    echo "<div class=\"card\" style=\"width: 18rem; display:inline-block;\">";
    // This needs to be fixed with cadet's picture
    echo "  <img class=\"card-img-top\" src=\"" . $file . "\" alt=\"Cadet Profile Picture\">";
    echo "<div class=\"card-body\">";
    echo "<h5 class=\"card-title\">Cadet " . $row['lastName'] . "</h5>";
    echo "<p class=\"card-text\"><strong>Rank: </strong>" . $row['rank'] . "<br><strong>Flight: </strong>" . $row['flight'] . "<br><strong>Position: </strong>" . $row['position'] . "</p>";
    echo "<a href='viewprofile.php?rin=" . $row['rin'] . "' class=\"btn btn-primary\">View Profile</a></div></div>";
}
?>



<?php include('./assets/inc/footer.php'); ?>