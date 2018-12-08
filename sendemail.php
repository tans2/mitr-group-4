<?php
include('./assets/inc/header.php');
include("assets/inc/dbinfo.php");
?>    <script>
              $(document).ready(function(){
                  $('#body').summernote({focus: true, toolbar: [
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['insert', ['link', 'hr']],
                    ['view', ['fullscreen', 'codeview']],
                    ['help', ['help']]
                  ] });
              });
            
             function sendBody() {
                document.getElementById('body').value = $('#body').summernote('code');
            };
          </script>
<style>
.note-popover .popover-content, .panel-heading.note-toolbar {
    display: none;
}
</style>

<div class="jumbotron container-fluid">
  <h1 class="display-4"> Send an Email </h1>
    <div class="card">
      <div class="card-body">
        <form id="batchemail" method="POST" action="sendemail.php" novalidate>
            <label class="card-text" for="address"><b>Mail Groups (Ctl/Command Click to multiselect)</b></label><br>
            <select id="grouplist" class="form-control" name="groups[]" multiple>
            <option value="null">No Groups [Default]</option>
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
            <input class="form-control" type="text" name="body" id="body" required><br>
            <button class="btn btn-sm btn-primary" type="submit" name="send" onclick="sendBody()" value="Send">Send</button>
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
                $query = 'SELECT primaryEmail AS email FROM (cadet LEFT JOIN groupMember ON cadet.rin = groupMember.rin) LEFT JOIN cadetGroup ON groupMember.groupID = cadetGroup.id WHERE cadetGroup.label = ?';
                $stmt = $mysqli->prepare($query);
                $size = count($_POST["groups"]);
                for($x = 0; $x < $size; $x++) { 
                    $stmt->bind_param("s", $_POST['groups'][$x]);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()){
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