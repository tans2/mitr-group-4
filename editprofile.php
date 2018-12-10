<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

?>

<head>
  <title>Edit Profile</title>
  <script src="assets/js/editProfile.js"></script>
</head>

<div class="container">
  <div class="row">
    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <form action="updateProfile.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" name="genInfo">
            <p><strong>Profile Picture: </strong></p><input type="file" placeholder="Enter name here" name="file"><br><br>
            <div>
                <strong>Primary Email:</strong><br>
                <input class="form-control" id="pemail" type="text" name="pemail" size="30" value="<?php echo $cadet->getPrimEmail() ?>"/>
            </div><br>
            <div>
                <strong>Secondary Email:</strong><br>
                <input class="form-control" type="text" name="semail" size="30" value="<?php echo $cadet->getSecEmail() ?>"/>
            </div><br>
            <div>
                <strong>Primary Phone:</strong><br>
                <input class="form-control" id="pphone" type="text" name="pphone" size="30" value="<?php echo $cadet->getPrimPhone() ?>"/>
            </div><br>
            <div>
                <strong>Secondary Phone:</strong><br>
                <input class="form-control" type="text" name="sphone" size="30" value="<?php echo $cadet->getSecPhone() ?>"/>
            </div><br>
            <div>
                <strong>GroupMe:</strong><br>
                <input class="form-control" type="text" name="groupme" size="30" value="<?php echo $cadet->getGroupMe() ?>"/>
            </div><br>
            <div>
                <strong>Position:</strong><br>
                <input class="form-control"type="text" name="position" size="30" value="<?php echo $cadet->getPosition() ?>"/>
            </div><br>
            <button class="btn btn-sm btn-primary" type="reset">Reset</button>
            <button class="btn btn-sm btn-primary" type="submit" name="submit">Save Changes</button>
        </form><br>
      </div>
    </div>
  </div>

    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <strong>Bio: </strong>
          <div class="cadetBio"><?php echo $cadet->getBio(); ?></div>
          <button id="edit" class="btn btn-sm btn-primary" onclick="editBio()" type="button">Edit</button>
          <button id="save" class="btn btn-sm btn-primary" onclick="saveBio()" type="button">Save</button><br><br>

          <strong>Air Force Goals: </strong>
          <div class="afGoals"><?php echo $cadet->getAirForceGoals(); ?></div>
          <button id="edit" class="btn btn-sm btn-primary" onclick="editAFG()" type="button">Edit</button>
          <button id="save" class="btn btn-sm btn-primary" onclick="saveAFG()" type="button">Save</button><br><br>

          <strong>Personal Goals: </strong>
          <div class="pGoals"><?php echo $cadet->getPersonalGoals(); ?></div>
          <button id="edit" class="btn btn-sm btn-primary" onclick="editPG()" type="button">Edit</button>
          <button id="save" class="btn btn-sm btn-primary" onclick="savePG()" type="button">Save</button><br><br>

          <strong>Awards and Achievements: </strong>
          <div class="awards"><?php echo $cadet->getAwards() ?></div>
          <button id="edit" class="btn btn-sm btn-primary" onclick="editAA()" type="button">Edit</button>
          <button id="save" class="btn btn-sm btn-primary" onclick="saveAA()" type="button">Save</button><br><br>
        </div>
      </div>
    </div>


    <div class="col-4">
      <div class="card">
        <div class="card-body">
          <form action="updateProfile.php" method="post" enctype="multipart/form-data" onsubmit="return validatePass()" name="passChange">
            <h5 class="card-title">Change Password</h5>
            <div>
                <strong>Old Password:</strong><br>
                <input class="form-control" type="password" name="oldPass" id="oldPass" size="30"/>
            </div><br>
            <div>
                <strong>New Password:</strong><br>
                <input class="form-control" type="text" name="newPass" id="newPass" size="30"/>
            </div><br>
            <div>
                <strong>Verify Password:</strong><br>
                <input class="form-control" id="verPass" type="text" name="verPass" size="30"/>
            </div><br>
            <button class="btn btn-sm btn-primary" type="reset">Reset</button>
            <button class="btn btn-sm btn-primary" type="submit" name="updatepass">Change Password</button>
          </form><br>
        </div>
      </div>
    </div>
  </div>
</div>
