<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

?>
<script src="assets/js/wiki.js"></script>


<button id="edit" class="btn btn-primary" onclick="editIndexWiki()" type="button">Edit Wiki</button>
<button id="save" class="btn btn-primary" onclick="saveIndexWiki()" type="button">Save Wiki</button><br><br>
<div class="indexwiki"><?php echo $cadet->getBio() ?></div>

<?php        
    include('./assets/inc/footer.php');   
?>