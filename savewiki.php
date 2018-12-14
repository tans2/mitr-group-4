<?php
require_once('assets/inc/dbinfo.php');
require_once('assets/objects/wiki.php');
session_start();

if ( !isset($_SESSION['login']) || !$_SESSION['login'] )
{
    header('Location: index.php');
}

if(isset($_POST['index']))
{
    $wiki = new wiki( "index", $mysqli );
    $wiki->setBody($_POST['index']);
    $wiki->updateWiki($mysqli);
} 
elseif(isset($_POST['profile'])) 
{
    $wiki = new wiki( "profile", $mysqli );
    $wiki->setBody($_POST['profile']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['home']))
{
    $wiki = new wiki( "home", $mysqli );
    $wiki->setBody($_POST['home']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['editprofile']))
{
    $wiki = new wiki( "editprofile", $mysqli );
    $wiki->setBody($_POST['editprofile']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['announcements']))
{
    $wiki = new wiki( "announcements", $mysqli );
    $wiki->setBody($_POST['announcements']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['events']))
{
    $wiki = new wiki( "events", $mysqli );
    $wiki->setBody($_POST['events']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['email']))
{
    $wiki = new wiki( "email", $mysqli );
    $wiki->setBody($_POST['email']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['directory']))
{
    $wiki = new wiki( "directory", $mysqli );
    $wiki->setBody($_POST['directory']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['admin']))
{
    $wiki = new wiki( "admin", $mysqli );
    $wiki->setBody($_POST['admin']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['faq']))
{
    $wiki = new wiki( "faq", $mysqli );
    $wiki->setBody($_POST['faq']);
    $wiki->updateWiki($mysqli);
}
elseif(isset($_POST['wk']))
{
    $wiki = new wiki( "wk", $mysqli );
    $wiki->setBody($_POST['wk']);
    $wiki->updateWiki($mysqli);
}

header("Location: wikihome.php");
?>