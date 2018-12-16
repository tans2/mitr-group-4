<?php
include('assets/inc/header.php');
require_once('assets/inc/dbinfo.php');
require_once('assets/objects/wiki.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if(isset($_POST['savewiki']))
{
    $wiki = new wiki( $_POST['wiki'], $mysqli ); 
    $wiki->setBody($_POST['savewiki']); 
    $wiki->updateWiki( $mysqli );
    header('Location: wikihome.php');
}

?>
<head>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=ij0h6vcxvcacvu1l56udgaairzb672xtq1kktiizh2cpf4fe"></script>
    <script src="assets/js/editwiki.js"></script>
</head>
<form action="editwiki.php" method="POST">
    <input type="text" style="display:none;" name="wiki" value='<?php echo $_POST['wiki']; ?>'/>
    <textarea id="wiki" name="savewiki"><?php 
                            $wiki = new wiki( $_POST['wiki'], $mysqli ); 
                            echo $wiki->getBody();  
        ?></textarea>
    <br><button type="submit" name="save" class="btn btn-primary btn-sm">Save Changes</button>
</form>
