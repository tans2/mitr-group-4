<?php
include('./assets/inc/header.php');
include("assets/inc/dbinfo.php");
?>

<div class="jumbotron container-fluid">
  <h1 class="display-4"> Send an Email </h1>
    <div class="card">
      <div class="card-body">
        <form id="batchemail" method="POST" action="sendemail.php">
            <label class="card-text" for="address"><b>Mail Groups (Ctl/Command Click to multiselect)</b></label><br>
            <select id="grouplist" name="groups[]" multiple>
            <option value="null">No Groups</option>
            <?php
                $query = 'SELECT label FROM cadetGroup';
                $stmt = $mysqli->prepare($query);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo "<option value = '" . $row['label'] . "'>" . $row['label'] . "</option>";
                }
            ?>
            </select><br>
            <label class="card-text" for="address"><b>To Address (Add ; after each email address)</b></label><br>
            <input class="form-control" type="text" name="To"><br>
            <label class="card-text" for="subject"><b>Subject</b></label><br>
            <input class="form-control" type="text" name="subject" required><br>
            <label class="card-text" for="body"><b>Body</b></label><br>
            <input class="form-control" type="text" name="body" required><br>
            <input class="btn btn-sm btn-primary" type="submit" name="send" value="Send">
        </form><br>

    <?php
    include("emailPHP.php");
    if (isset($_POST["send"])){
        if(!isset($_POST["To"]) && (!isset($_POST["groups"]) || $_POST["groups"] = "null" || in_array("null", $_POST["groups"]))){
            echo "<script type='text/javascript'>alert('There are no email addresses to send to');</script>";
        } else {
            if(isset($_POST["To"])){
                $trimmed = str_replace(" ", "",$_POST["To"]);
                $addresses = explode(";", $trimmed);
            }
            if(isset($_POST["groups"]) && $_POST["groups"] != "null" && !in_array("null", $_POST["groups"])){

                $query = 'SELECT primaryEmail AS email FROM (cadet LEFT JOIN groupmember ON cadet.rin = groupmember.rin) LEFT JOIN cadetgroup ON groupmember.groupID = cadetgroup.id WHERE cadetgroup.label = ?';
                $stmt = $mysqli->prepare($query);
                $size = count($_POST["groups"]);
                for($x = 0; $x < $size; $x++) { 
                    $stmt->bind_param("s", $_POST['groups'][$x]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()){
                        echo $row['email'];
                        $addresses[] = $row['email'];
                    }
                }
            }
            echo(send($addresses, $_POST["subject"], $_POST["body"]));
        }
    }   
    ?>
</body>
</html>
<?php include("./assets/inc/footer.php"); ?>