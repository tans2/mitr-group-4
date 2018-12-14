<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<head>
  <title>My Profile</title>
</head>
<style>
/* Styles for mobile */
@media (max-width: 500px) 
{
    .col-4, .col-8
    {
        -ms-flex: 100%;
        flex: 100%;
        max-width: 100%;
    }
    body
    {
        min-width: 400px;
    }
}
</style>
<body>
  <div class="jumbotron container-fluid">
    <h1 class="display-4"><?php     
      if(strpos($cadet->getRank(), "AS") !== false || strpos($cadet->getRank(), "None") !== false)
        {
        echo "Cadet " . $cadet->getLast();
        }
      else
        {
        echo $cadet->getRank() . " " . $cadet->getLast();
      } ?></h1>
    <div class="container">
      <div class="row">
        <div class="col-4">
          <div class="card">
            <img class="card-img-top" alt="Profile picture" src=
            <?php
              $files = glob("assets/images/*.{jpg,png,jpeg}", GLOB_BRACE);
              $found = false;
              foreach($files as $file)
                {
                  $info = pathinfo($file);
                  if($info['filename'] == $_SESSION['rin'])
                    {
                      echo $file; 
                      $found = true;
                    }
                }
                  if(!$found)
                  {
                    echo "assets/images/default.jpeg";
                  }
            ?> >
          <div class="card-body">
            <p class="card-text">
            <strong>Contact Information: </strong><br>
            <strong>Email: </strong> <?php echo $cadet->getPrimEmail() ?><br>
            <strong>Phone Number: </strong> <?php echo $cadet->getPrimPhone() ?><br>
            <strong>Flight: </strong> <?php echo $cadet->getFlight() ?><br>
            <strong>Position: </strong> <?php echo $cadet->getPosition() ?><br>
            <strong>Major: </strong> <?php echo $cadet->getMajor() ?><br>
            </p>
            <a class="btn btn-primary" role="button" href="editprofile.php">Edit Page</a>
          </div>
          </div>
        </div>

        <div class="col-8">
          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rank:</h5>
                <p class="card-text"><?php echo $cadet->getRank() ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bio:</h5>
                <p class="card-text"><?php echo $cadet->getBio() ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Awards and Achievements:</h5>
                <p class="card-text"><?php echo $cadet->getAwards() ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Air Force Goals:</h5>
                <p class="card-text"><?php echo $cadet->getAirForceGoals() ?></p>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
                <h5 class="card-title">Personal Goals:</h5>
                <p class="card-text"><?php echo $cadet->getPersonalGoals() ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
