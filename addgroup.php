<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>


<div id="Edit Groups" class="card" style = "position: absolute;width: 50%;">
    <div class="card-body">
            <form id="makegroup" method="POST" name="makegroup" action="group.php">
                <strong>Create Group:</strong><br>
                <input type="text" name="groupname" id="groupname"><br>
                <button type="submit" name="submit">Create Group</button>
            </form><br>

            <?php 
                if(isset($_POST['selectgroup']))
                {
                    $_SESSION['selectgroup'] = $_POST['selectgroup'];
                } 
            ?>

            <h3>Select Group</h3>
            <form id="selectgroup" method="POST" name="selectgroup" action="addgroup.php">
                <select id="selectgroup" name="selectgroup">
                <?php
                    $query = 'SELECT * FROM cadetGroup';
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        if(isset($_SESSION['selectgroup']) && $_SESSION['selectgroup'] == $row['id'])
                        {
                            echo "<option selected value ='" . $row['id'] . "'>" . $row['label'] . "</option>";
                        }
                        else
                        {
                            echo "<option value ='" . $row['id'] . "'>" . $row['label'] . "</option>";
                        }
                        
                    }
                ?>
                </select><br>
                <button type="submit" name="submit">Select Group</button>
            </form><br>

        <?php if(isset($_SESSION['selectgroup']))
                {
                    $visible = 'visible';
                }
                else
                {
                    $visible = 'hidden';
                }
        ?>

            <form id="addgroup" method="POST" name="addgroup" action="group.php" style="<?php echo $visible ?>">
                <strong>Add Members</strong><br> 
                <div class="selectcadets" style="height:100px; width:100px overflow-y: scroll;">
                <?php
                    $query = 'SELECT * FROM cadet';
                    $stmt = $mysqli->prepare($query);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        echo "<input type='checkbox' name='acadets[]' value ='" . $row['rin'] . "'>Cadet " . $row['lastName'] . "</input><br>";
                    }
                ?>
            </div><br>
            
            <button type="submit" name="submit">Add Members</button>
        </form><br>
        
        <form id="addgroup" method="POST" name="addgroup" action="group.php" style="<?php echo $visible ?>">
            <strong>Remove Members</strong><br> 
            <div class="selectcadets" style="height:100px; width:100px overflow-y: scroll;">
            <?php
                $query = 'SELECT cadet.rin as rin, cadet.lastName as lastName FROM cadet, groupMember WHERE cadet.rin = groupMember.rin AND groupMember.groupID = ?';
                $stmt = $mysqli->prepare($query);
                $stmt->bind_param( "i", $_SESSION['selectgroup'] );
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    echo "<input type='checkbox' name='rcadets[]' value ='" . $row['rin'] . "'>Cadet " . $row['lastName'] . "</input><br>";
                }
            ?>
            </div><br>
            
            <button type="submit" name="submit">Remove Members</button>
        </form>
    </div>
</div>

<?php
include('./assets/inc/footer.php');
?>