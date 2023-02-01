<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Profilo";
$templateParams["contenuto"] = "profilo-template.php";
$templateParams["posts"] = $dbh->getPostsbyId(1);
$templateParams["seguaci"] = $dbh->getSeguaciById(1);
$templateParams["seguiti"] = $dbh->getSeguitiById(1);
array_push($templateParams["js"], "js/follow.js");

require 'template/base.php';
?>