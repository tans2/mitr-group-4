<?php
include('./assets/inc/header.php');

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}
?>

<h1 style="text-align: center;"><span style="text-decoration: underline;"><strong>Detachment Wiki</strong></span></h1>
<p><a title="Index Page" href="assets/wiki/indexwiki.php" target="_blank" rel="noopener">Index Page</a></p>
<p><a title="Home Page" href="assets/wiki/homewiki.php" target="_blank" rel="noopener">Home Page</a></p>
<p><a title="Profile Page" href="assets/wiki/profilewiki.php" target="_blank" rel="noopener">Profile Page</a></p>
<p><a title="Edit Profile Page" href="assets/wiki/editprofilewiki.php" target="_blank" rel="noopener">Edit Profile Page</a></p>
<p><a title="Announcements Page" href="assets/wiki/announcementswiki.php" target="_blank" rel="noopener">Announcements Page</a></p>
<p><a title="Events Page" href="assets/wiki/eventswiki.php" target="_blank" rel="noopener">Events Page</a></p>
<p><a title="Email Page" href="assets/wiki/emailwiki.php" target="_blank" rel="noopener">Email Page</a></p>
<p><a title="Directory Page" href="assets/wiki/directorywiki.php" target="_blank" rel="noopener">Directory Page</a></p>
<p><a title="Admin Page" href="assets/wiki/adminwiki.php" target="_blank" rel="noopener">Admin Page</a></p>
<p><a title="FAQ Page" href="assets/wiki/faqwiki.php" target="_blank" rel="noopener">FAQ Page</a></p>

<?php
include('./assets/inc/footer.php');

?>