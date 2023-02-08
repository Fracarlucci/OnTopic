<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Profilo";
$templateParams["contenuto"] = "profilo-template.php";
$templateParams["posts"] = $dbh->getPostsbyId(1);
$templateParams["seguaci"] = $dbh->getSeguaciById(1);
array_push($templateParams["js"], "js/follow.js", "js/usersList.js");

require_once './components/usersList-modal/usersList-modal.php';
require 'template/base.php';
?>