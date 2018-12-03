<?php
include("../objects/wiki.php");
include("../inc/dbinfo.php");

if(isset($_POST['index']))
{
    $wiki = new wiki( "index", $mysqli );
    $wiki->setBody($_POST['index']);
    $wiki->updateWiki($mysqli);
    header("Location: indexwiki.php");
} 
elseif(isset($_POST['profile'])) 
{
    $wiki = new wiki( "profile", $mysqli );
    $wiki->setBody($_POST['profile']);
    $wiki->updateWiki($mysqli);
    header("Location: profilewiki.php");
}
elseif(isset($_POST['home']))
{
    $wiki = new wiki( "home", $mysqli );
    $wiki->setBody($_POST['home']);
    $wiki->updateWiki($mysqli);
    header("Location: homewiki.php");
}
elseif(isset($_POST['editprofile']))
{
    $wiki = new wiki( "editprofile", $mysqli );
    $wiki->setBody($_POST['editprofile']);
    $wiki->updateWiki($mysqli);
    header("Location: editprofilewiki.php");
}
elseif(isset($_POST['announcements']))
{
    $wiki = new wiki( "announcements", $mysqli );
    $wiki->setBody($_POST['announcements']);
    $wiki->updateWiki($mysqli);
    header("Location: announcementswiki.php");
}
elseif(isset($_POST['events']))
{
    $wiki = new wiki( "events", $mysqli );
    $wiki->setBody($_POST['events']);
    $wiki->updateWiki($mysqli);
    header("Location: eventswiki.php");
}
elseif(isset($_POST['email']))
{
    $wiki = new wiki( "email", $mysqli );
    $wiki->setBody($_POST['email']);
    $wiki->updateWiki($mysqli);
    header("Location: emailwiki.php");
}
elseif(isset($_POST['directory']))
{
    $wiki = new wiki( "directory", $mysqli );
    $wiki->setBody($_POST['directory']);
    $wiki->updateWiki($mysqli);
    header("Location: directorywiki.php");
}
elseif(isset($_POST['admin']))
{
    $wiki = new wiki( "admin", $mysqli );
    $wiki->setBody($_POST['admin']);
    $wiki->updateWiki($mysqli);
    header("Location: adminwiki.php");
}
elseif(isset($_POST['faq']))
{
    $wiki = new wiki( "faq", $mysqli );
    $wiki->setBody($_POST['faq']);
    $wiki->updateWiki($mysqli);
    header("Location: faqwiki.php");
}
else
{
    header("Location: ../../wikihome.php");
}
?>