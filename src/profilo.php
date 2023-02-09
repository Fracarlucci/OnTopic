<?php
require_once 'base-elements.php';

$userId = $_GET["id"];

$templateParams["titolo"] = "OnTopic - Profilo";
$templateParams["contenuto"] = "profilo-template.php";
$templateParams["utenteProfilo"] = $dbh->getUserById($userId);
$templateParams["posts"] = $dbh->getPostsbyId($userId);
$templateParams["seguaci"] = $dbh->getSeguaciById($userId);
array_push($templateParams["js"], "js/follow.js", "js/usersList.js");

require_once './components/usersList-modal/usersList-modal.php';
require 'template/base.php';
?>