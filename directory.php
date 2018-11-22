<?php 
session_start();
include('./assets/cadet.php');
include('./assets/inc/header.php');

// Checks to see if user is already logged in
if ( isset($_SESSION['login']) && $_SESSION['login'] )
{
    $cadet = new cadet( $_SESSION["rin"], $mysqli );
}
else
{
    header('Location: index.php');
}

$stmt = $mysqli->prepare("SELECT * FROM cadet");
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc())
{
    echo "<div class=\"card\" style=\"width: 18rem;\">";
    // This needs to be fixed with cadet's picture
    echo "  <img class=\"card-img-top\" src=\".../100px180/\" alt=\"Card image cap\">";
    echo "<div class=\"card-body\">";
    echo "<h5 class=\"card-title\">Cadet " . $row['lastName'] . "</h5>";
    echo "<p class=\"card-text\"><strong>Rank: </strong>" . $row['rank'] . "<br><strong>Flight: </strong>" . $row['flight'] . "<br><strong>Position: </strong>" . $row['position'] . "</p>";
    echo "<a href='' class=\"btn btn-primary\">View Profile</a></div></div>";
}
?>



<?php include('./assets/inc/footer.php'); ?>