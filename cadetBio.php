<?php

require_once('cadet.php');

$host = "192.168.64.2";
$user = "username";
$password = "password";
$database = "mitr";

// Create connection
$mysqli = mysqli_connect($host, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";


/*
 * This creates the bare minimum cadet profile with only necessary
 * attributes filled out.
 *
 * @param rin - rensselaer id number to uniquely identify each cadet
 * @param first - first name of cadet
 * @param last - last name of cadet
 * @param rank - rank of the cadet
 * @param email - primary email of the cadet
 * @prarm phone - primary phone number of the cadet
 * @param pass - cadet profile's password
 */
function createCadet( $rin, $first, $last, $rank, $email, $phone, $pass, $mysqli )
{
    $stmt = $mysqli->prepare("INSERT INTO cadet (rin, firstName, lastName, rank, primaryEmail, primaryPhone, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $stmt->bind_param( "issssis", $rin, $first, $last, $rank, $email, $phone, $hash );
    $stmt->execute();
    $stmt->close();
}


$obj = new cadet( 123456789, $mysqli );
echo $obj->getPrimEmail();

?>