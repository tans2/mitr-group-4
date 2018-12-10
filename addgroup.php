<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<head>
  <title>Add Group</title>
</head>
<style>
/* Styles for mobile */
@media (max-width: 500px) 
{
    .card
    {
        width: 100%;
    }
    body
    {
        min-width: 400px;
    }
    .selectcadets
    {
        width: 100%;
    }
}
</style>
<body>
<div class="jumbotron container-fluid">
  <div class="container">
    <h1 class="display-4"> Create Group </h1>
    <div class="card" id="Edit Groups">
      <div class="card-body">
        
        <form id="makegroup" method="POST" name="makegroup" action="group.php">
          <h5 class="card-text">Create Group</h5>
          <input type="text" name="groupname" id="groupname"><br></br>
          <button class="btn btn-sm btn-primary" type="submit" name="submit">Create Group</button>
        </form><br>
        
        <?php 
          if(isset($_POST['selectgroup']))
            {
              $_SESSION['selectgroup'] = $_POST['selectgroup'];
            } 
        ?>
        <h5 class="card-text">Select Group</h5>
        
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
          </select><br></br>
          <button class="btn btn-sm btn-primary" type="submit" name="submit">Select Group</button>
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
          <h5 class="card-text">Add Members</h5>
            <div class="selectcadets" style="height:100px;overflow-y: scroll;border: solid grey 1px;">
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
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Add Members</button>
        </form><br>
        
        <form id="addgroup" method="POST" name="addgroup" action="group.php" style="<?php echo $visible ?>">
          <h5>Remove Members</h5>
          <div class="selectcadets" style="height:100px;border: solid grey 1px;overflow-y: scroll;">
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
          <button class="btn btn-sm btn-primary" type="submit" name="submit">Remove Members</button>
        </form>

      </div>
    </div>
  </div>
</div>
</body>