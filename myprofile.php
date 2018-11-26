<?php 
include('./assets/inc/header.php'); 
if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>


<div class="jumbotron">
    <h1 class="display-4" style="position:sticky"><?php echo "Cadet " . $cadet->getLast() ?></h1>
    <div> <!-- style="display:block; height: 300px"> --> 
      <img class="picture" style="display: block;position: relative;left: 0px;width: 25%;margin:auto" src=<?php
        $files = glob("./assets/images/*.{jpg,png,jpeg}", GLOB_BRACE);
        $found = false;
        foreach($files as $file)
          {
            $info = pathinfo($file);
            if($info['filename'] === $_SESSION['rin'])
              {
                echo $file; 
                $found = true;
              }
          }
            if(!$found)
            {
              echo "assets/images/default.jpeg";
            }
      ?> height="300px" width="300px" alt="Profile picture"/>
    </div>

    <p class="lead" style="display: block;position: absolute;right: 50px;width: 50%;margin: auto;">
      <strong>Contact Information: </strong><br>
      <strong>Email: </strong> <?php echo $cadet->getPrimEmail() ?><br>
      <strong>Phone Number: </strong> <?php echo $cadet->getPrimPhone() ?><br>
      <strong>Flight: </strong> <?php echo $cadet->getFlight() ?><br>
      <strong>Position: </strong> <?php echo $cadet->getPosition() ?><br>
    </p>

    <hr class="my-4" style="display: block;position: relative;margin: auto;">
      <p><strong>Rank:</strong> <?php echo $cadet->getRank() ?></p>
      <p><strong>Bio: </strong><?php echo $cadet->getBio() ?></p>
      <p><strong>Awards and Achievements: </strong><?php echo $cadet->getAwards() ?></p>
      <p><strong>Air Force Goals: </strong><?php echo $cadet->getAirForceGoals() ?></p>
      <p><strong>Personal Goals: </strong><?php echo $cadet->getPersonalGoals() ?></p>
      <a class="btn btn-primary btn-lg" role="button" href="editprofile.php">Edit Page</a>
</div>
    
<?php include('./assets/inc/footer.php') ?>
