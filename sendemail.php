<?php
include('./assets/inc/header.php');
include("assets/inc/dbinfo.php");
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>    

<head>
  <title> Send Email </title>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ij0h6vcxvcacvu1l56udgaairzb672xtq1kktiizh2cpf4fe"></script>
        <script src="assets/js/sendemail.js"></script>
</head>
<body>
<div class="jumbotron container-fluid">
  <h1 class="display-4"> Send an Email </h1>
    <div class="card">
      <div class="card-body">
        <form id="batchemail" method="POST" action="emailGroup.php" novalidate>
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
            <textarea class="form-control" type="text" name="body" id="body"></textarea><br>
            <button class="btn btn-sm btn-primary" type="submit" name="send" onclick="sendBody()" value="Send">Send</button>
        </form><br>
</body>
</html>