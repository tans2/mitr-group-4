<?php
include('./assets/inc/header.php');
include("assets/inc/dbinfo.php");
?>

    <form id="batchemail" method="POST" action="sendemail.php">
        <label for="address"><b>Mail Groups (Ctl/Command Click to multiselect)</b></label><br>
        <select id="grouplist" name="groups" multiple>
        <option value="null">No Groups</option>
        <?php
            $query = 'SELECT label FROM cadetGroup';
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
    </form><br>

    <form id="makegroup" method="POST" name="makegroup" action="group.php">
        <strong>Create Group:</strong><br>
        <input type="text" name="groupname" id="groupname"><br>
        <button type="submit" name="submit">Create Group</button>
    </form><br>

    <h3>Add Members to Group</h3>
    <form id="addgroup" method="POST" name="addgroup" action="group.php">
        <strong>Select Group</strong><br> 
        <select id="selectgroup" name="selectgroup">
        <?php
            $query = 'SELECT * FROM cadetGroup';
            $stmt = $mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<option value ='" . $row['label'] . "'>" . $row['label'] . "</option>";
            }
        ?>
        </select><br>
        
        <strong>Select Cadets</strong><br> 
        <div class="selectcadets" style="height:200px; width:100px overflow-y: scroll;">
        <?php
            $query = 'SELECT * FROM cadet';
            $stmt = $mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<input type='checkbox' name='cadets[]' value ='" . $row['rin'] . "'>Cadet " . $row['lastName'] . "</input><br>";
            }
        ?>
        </div><br>
        
        <button type="submit" name="submit">Add Members</button>
    </form><br>
    
   <h3>Remove Members from Group</h3>
    <form id="remgroup" method="POST" name="remgroup" action="group.php">
        <strong>Select Group</strong><br> 
        <select id="delgroup" name="delgroup">
        <?php
            $query = 'SELECT * FROM cadetGroup';
            $stmt = $mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<option value ='" . $row['id'] . "'>" . $row['label'] . "</option>";
            }
        ?>
        </select><br>
        
        <strong>Select Cadets</strong><br> 
        <div class="selectcadets" style="height:200px; width:100px overflow-y: scroll;">
        <?php
            $query = 'SELECT * FROM cadet';
            $stmt = $mysqli->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                echo "<input type='checkbox' name='cadets[]' value ='" . $row['rin'] . "'>Cadet " . $row['lastName'] . "</input><br>";
            }
        ?>
        </div><br>
        
        <button type="submit" name="submit">Remove Members</button>
    </form>

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
                //grab email addresses from all the cadets in the selected groups
                //$addresses[] = //This adds a value into an array (also creates array if there wasn't one yet)
            }
            echo(send($addresses, $_POST["subject"], $_POST["body"]));
        }
    }   
    ?>
</body>
</html>
<?php include("./assets/inc/footer.php"); ?>