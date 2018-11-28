<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

?>
<script>
var editBio = function() {
  $('.cadetBio').summernote({focus: true});
};

var saveBio = function() {
  var markup = $('.cadetBio').summernote('code');
    window.location.href= "updateProfile.php?bio=" + markup;
  $('.cadetBio').summernote('destroy');
};
    
var editAFG = function() {
  $('.afGoals').summernote({focus: true});
};

var saveAFG = function() {
  var markup = $('.afGoals').summernote('code');
    window.location.href= "updateProfile.php?afg=" + markup;
  $('.afGoals').summernote('destroy');
};
    
var editPG = function() {
  $('.pGoals').summernote({focus: true});
};

var savePG = function() {
  var markup = $('.pGoals').summernote('code');
    window.location.href= "updateProfile.php?pg=" + markup;
  $('.pGoals').summernote('destroy');
};
    
var editAA = function() {
  $('.awards').summernote({focus: true});
};

var saveAA = function() {
  var markup = $('.awards').summernote('code');
    window.location.href= "updateProfile.php?aa=" + markup;
  $('.awards').summernote('destroy');
};

</script>

<form action="updateProfile.php" method="post" enctype="multipart/form-data">
    <p><strong>Profile Picture: </strong></p><input type="file" placeholder="Enter name here" name="file"><br><br>
    <div>
        <strong>Primary Email:</strong><br>
        <input type="text" name="pemail" size="30" value="<?php echo $cadet->getPrimEmail() ?>"/>
    </div><br>
    <div>
        <strong>Secondary Email:</strong><br>
        <input type="text" name="semail" size="30" value="<?php echo $cadet->getSecEmail() ?>"/>
    </div><br>
    <div>
        <strong>Primary Phone:</strong><br>
        <input type="text" name="pphone" size="30" value="<?php echo $cadet->getPrimPhone() ?>"/>
    </div><br>
    <div>
        <strong>Secondary Phone:</strong><br>
        <input type="text" name="sphone" size="30" value="<?php echo $cadet->getSecPhone() ?>"/>
    </div><br>
    <div>
        <strong>GroupMe:</strong><br>
        <input type="text" name="groupme" size="30" value="<?php echo $cadet->getGroupMe() ?>"/>
    </div><br>
    <div>
        <strong>Position:</strong><br>
        <input type="text" name="position" size="30" value="<?php echo $cadet->getPosition() ?>"/>
    </div><br>
    <button class="btn btn-primary" type="reset">Reset</button>
    <button class="btn btn-primary" type="submit" name="submit">Save Changes</button>
</form><br>

<strong>Bio: </strong>
<div class="cadetBio"><?php echo $cadet->getBio() ?></div>
<button id="edit" class="btn btn-primary" onclick="editBio()" type="button">Edit</button>
<button id="save" class="btn btn-primary" onclick="saveBio()" type="button">Save</button><br>

<strong>Air Force Goals: </strong>
<div class="afGoals"><?php echo $cadet->getAirForceGoals() ?></div>
<button id="edit" class="btn btn-primary" onclick="editAFG()" type="button">Edit</button>
<button id="save" class="btn btn-primary" onclick="saveAFG()" type="button">Save</button><br>

<strong>Personal Goals: </strong>
<div class="pGoals"><?php echo $cadet->getPersonalGoals() ?></div>
<button id="edit" class="btn btn-primary" onclick="editPG()" type="button">Edit</button>
<button id="save" class="btn btn-primary" onclick="savePG()" type="button">Save</button><br>

<strong>Awards and Achievements: </strong>
<div class="awards"><?php echo $cadet->getAwards() ?></div>
<button id="edit" class="btn btn-primary" onclick="editAA()" type="button">Edit</button>
<button id="save" class="btn btn-primary" onclick="saveAA()" type="button">Save</button><br>


<?php        
    include('./assets/inc/footer.php');   
?>