<?php
require_once 'base-without-posts.php';

//redirect if not auth
if(!$templateParams["isAuth"] || !isset($_GET["postId"]) || !isOwner($loggedUserId, $_GET["postId"], $dbh)){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Modifica Post";
$templateParams["contenuto"] = "modifica-post-template.php";
array_push($templateParams["js"], "js/modificaPost.js");

require 'template/base.php';
?>