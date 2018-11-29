<?php
include("../objects/wiki.php");
include("../inc/dbinfo.php");

if(isset($_GET['index']))
{
    $wiki = new wiki( "index", $mysqli );
    $wiki->setBody($_GET['index']);
    $wiki->updateWiki($mysqli);
    header("Location: indexwiki.php");
} 
elseif(isset($_GET['profile'])) 
{
    $wiki = new wiki( "profile", $mysqli );
    $wiki->setBody($_GET['profile']);
    $wiki->updateWiki($mysqli);
    header("Location: profilewiki.php");
}
elseif(isset($_GET['home']))
{
    $wiki = new wiki( "home", $mysqli );
    $wiki->setBody($_GET['home']);
    $wiki->updateWiki($mysqli);
    header("Location: homewiki.php");
}
elseif(isset($_GET['editprofile']))
{
    $wiki = new wiki( "editprofile", $mysqli );
    $wiki->setBody($_GET['editprofile']);
    $wiki->updateWiki($mysqli);
    header("Location: editprofilewiki.php");
}
elseif(isset($_GET['announcements']))
{
    $wiki = new wiki( "announcements", $mysqli );
    $wiki->setBody($_GET['announcements']);
    $wiki->updateWiki($mysqli);
    header("Location: announcementswiki.php");
}
elseif(isset($_GET['events']))
{
    $wiki = new wiki( "events", $mysqli );
    $wiki->setBody($_GET['events']);
    $wiki->updateWiki($mysqli);
    header("Location: eventswiki.php");
}
elseif(isset($_GET['email']))
{
    $wiki = new wiki( "email", $mysqli );
    $wiki->setBody($_GET['email']);
    $wiki->updateWiki($mysqli);
    header("Location: emailwiki.php");
}
elseif(isset($_GET['directory']))
{
    $wiki = new wiki( "directory", $mysqli );
    $wiki->setBody($_GET['directory']);
    $wiki->updateWiki($mysqli);
    header("Location: directorywiki.php");
}
elseif(isset($_GET['admin']))
{
    $wiki = new wiki( "admin", $mysqli );
    $wiki->setBody($_GET['admin']);
    $wiki->updateWiki($mysqli);
    header("Location: adminwiki.php");
}
elseif(isset($_GET['faq']))
{
    $wiki = new wiki( "faq", $mysqli );
    $wiki->setBody($_GET['faq']);
    $wiki->updateWiki($mysqli);
    header("Location: faqwiki.php");
}
else
{
    header("Location: ../../wikihome.php");
}
?>