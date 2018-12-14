<?php 
    include('assets/inc/dbinfo.php');
    if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
    {
        header('Location: index.php');
    }

    if(isset($_POST['eventTitle']))
    {
      if (isset($_POST['type']) && $_POST['type'] === 'llab')
      {
          $llab = 1;
          $pt = 0;
      }
      else if (isset($_POST['type']) && $_POST['type'] === 'pt') 
      {
          $llab = 0;
          $pt = 1;
      }
      else
      {
          $llab = 0;
          $pt = 0;
      }
      $title = htmlspecialchars(trim($_POST['eventTitle']));
      $date = $_POST['eventDate'];
      $insertquery = "INSERT INTO `cadetEvent` (`name`, `date`, `pt`, `llab`) VALUES (?,?,?,?)";
      $stmt = $mysqli->prepare($insertquery);
      $stmt->bind_param( "ssii", $title, $date, $pt, $llab );
      $stmt->execute();
      $stmt->close();
      }
//    header('Location: attendance.php');
?>