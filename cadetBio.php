<?php
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
 * Returns a cadet's bio based off of their RIN.
 *
 * @param $rin - cadet's rin whose bio your looking for
 * @param $mysqli - sql connection to query with
 */
function getBio( $rin, $mysqli )
{
    $sql = "SELECT bio FROM cadet WHERE rin = (?)";
    $stmt = $mysqli->prepare($sql);
    if(!($stmt->bind_param( "i", $rin )))
    {
        echo "Prepared statement bind failed!";
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo $row['bio'];
    $stmt->close();
}

/*
 * Changes a cadet's bio based off of their RIN.
 *
 * @param $rin - cadet's rin whose bio your looking for
 * @param $mysqli - sql connection to query with
 * @param $bioText - text to set as the new bio
 */
function updateBio( $rin, $mysqli, $bioText )
{
    $sql = "UPDATE cadet SET bio = (?) WHERE rin = (?)";
    $stmt = $mysqli->prepare($sql);
    if(!($stmt->bind_param( 'si', $bioText, $rin )))
    {
        echo "Prepared statement bind failed!";
    }
    $stmt->execute();
    $stmt->close();
}

/*
 * Returns a cadet's primaryEmail based off of their RIN.
 *
 * @param $rin - cadet's rin whose email your looking for
 * @param $mysqli - sql connection to query with
 */
function getPrimEmail( $rin, $mysqli )
{
    $sql = "SELECT primaryEmail FROM cadet WHERE rin = (?)";
    $stmt = $mysqli->prepare($sql);
    if(!($stmt->bind_param( "i", $rin )))
    {
        echo "Prepared statement bind failed!";
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo $row['primaryEmail'];
    $stmt->close();
}

/*
 * Changes a cadet's primary email based off of their RIN.
 *
 * @param $rin - cadet's rin whose email your looking for
 * @param $mysqli - sql connection to query with
 * @param $email - text to set as the new primaryEmail
 */
function updatePrimEmail( $rin, $mysqli, $email )
{
    $sql = "UPDATE cadet SET primaryEmail = (?) WHERE rin = (?)";
    $stmt = $mysqli->prepare($sql);
    if(!($stmt->bind_param( 'si', $email, $rin )))
    {
        echo "Prepared statement bind failed!";
    }
    $stmt->execute();
    $stmt->close();
}

/*
 * Returns a cadet's secondary email based off of their RIN.
 *
 * @param $rin - cadet's rin whose email your looking for
 * @param $mysqli - sql connection to query with
 */
function getSecEmail( $rin, $mysqli )
{
    $sql = "SELECT secondaryEmail FROM cadet WHERE rin = (?)";
    $stmt = $mysqli->prepare($sql);
    if(!($stmt->bind_param( "i", $rin )))
    {
        echo "Prepared statement bind failed!";
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    echo $row['secondaryEmail'];
    $stmt->close();
}

/*
 * Changes a cadet's secondary email based off of their RIN.
 *
 * @param $rin - cadet's rin whose email your looking for
 * @param $mysqli - sql connection to query with
 * @param $email - text to set as the new secondary email
 */
function updateSecEmail( $rin, $mysqli, $email )
{
    $sql = "UPDATE cadet SET secondaryEmail = (?) WHERE rin = (?)";
    $stmt = $mysqli->prepare($sql);
    if(!($stmt->bind_param( 'si', $email, $rin )))
    {
        echo "Prepared statement bind failed!";
    }
    $stmt->execute();
    $stmt->close();
}

/*
 * Removes a cadet's secondary email based off of their RIN.
 *
 * @param $rin - cadet's rin whose email your looking for
 * @param $mysqli - sql connection to query with
 */
function deleteSecEmail( $rin, $mysqli )
{
    $sql = "UPDATE cadet SET secondaryEmail = null WHERE rin = (?)";
    $stmt = $mysqli->prepare($sql);
    if(!($stmt->bind_param( 'i', $rin )))
    {
        echo "Prepared statement bind failed!";
    }
    $stmt->execute();
    $stmt->close();
}

//updatePrimEmail( 123456789, $mysqli, "newEmailUpdate" );
getBio( 123456789, $mysqli );
//getSecEmail( 123456789, $mysqli );
?>