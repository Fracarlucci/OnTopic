<?php
require_once 'base-with-posts.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$currentUserId = $_GET["id"];

$templateParams["titolo"] = "OnTopic - Profilo";
$templateParams["contenuto"] = "profilo-template.php";
$templateParams["utenteProfilo"] = $dbh->getUserById($currentUserId);
$templateParams["posts"] = $dbh->getPostsbyId($currentUserId);
$templateParams["seguaci"] = $dbh->getSeguaciById($currentUserId);
$templateParams["seguiti"] = $dbh->getSeguitiById($currentUserId);
array_push($templateParams["js"], "js/follow.js", "js/usersList.js");

require_once './components/usersList-modal/usersList-modal.php';
require 'template/base.php';
?>