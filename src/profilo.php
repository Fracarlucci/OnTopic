<?php
require_once 'base-with-posts.php';

//redirect if not auth
if(!$templateParams["isAuth"] || !isset($_GET["id"])){
    header('Location: index.php');
}

$currentUserId = $_GET["id"];

$templateParams["titolo"] = "OnTopic - Profilo";
$templateParams["contenuto"] = "profilo-template.php";

/* Controllo se il qp è corretto*/
$templateParams["utenteProfilo"] = $dbh->getUserById($currentUserId);
if(!$templateParams["utenteProfilo"]) {
    header('Location: index.php');
}

$templateParams["posts"] = $dbh->getPostsbyId($currentUserId);
$templateParams["seguaci"] = $dbh->getSeguaciById($currentUserId);
$templateParams["seguiti"] = $dbh->getSeguitiById($currentUserId);
array_push($templateParams["js"], "js/follow.js", "js/usersList.js");

require 'template/base.php';
?>