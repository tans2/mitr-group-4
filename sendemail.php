<?php
include('./assets/inc/header.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Send Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "mitr";
    // Create connection
    $mysqli = mysqli_connect($host, $user, $password, $database);
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    //echo "Connected successfully";
    ?>
    <form id="batchemail" method="POST" action="emailPHP.php">
        <label for="address"><b>Mail Groups (Ctl/Command Click to multiselect)</b></label><br>
        <select id="grouplist" name="groups" multiple>
        <option value="null">No Groups</option>
        <?php
            $query = 'SELECT label FROM cadetgroup';
            $stmt = $mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<option value = " . $row['label'] . ">" . $row['label'] . "</option>";
            }
        ?>
        </select><br>
        <label for="address"><b>To Address (Add ; after each email address)</b></label><br>
        <input type="text" name="To"><br>
        <label for="subject"><b>Subject</b></label><br>
        <input type="text" name="subject" required><br>
        <label for="body"><b>Body</b></label><br>
        <input type="text" name="body" required><br>
        <input type="submit" name="send" value="Send">
    </form>
    <?php
    include("emailPHP.php");
    if (isset($_POST["send"])){
        if(!isset($_POST["To"]) && (!isset($_POST["groups"]) || $_POST["groups"] = "null" || in_array("null", $_POST["groups"]))){
            echo "<script type='text/javascript'>alert('There are no email addresses to send to');</script>";
        } else {
            if(isset($_POST["To"])){
                $trimmed = str_replace(" ", "",$_POST["To"]);
                $addresses = split(";", trimmed);
            }
            if(isset($_POST["groups"]) && $_POST["groups"] != "null" && !in_array("null", $_POST["groups"])){
                //grab email addresses from all the cadets in the selected groups
                //$addresses[] = 
            }
            send($addresses, $_POST["subject"], $_POST["body"]);
        }
    }   
    ?>
</body>
</html>
<?php include("./assets/inc/footer.php"); ?>