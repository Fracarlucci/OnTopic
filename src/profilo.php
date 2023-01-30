<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Profilo";
$templateParams["contenuto"] = "profilo-template.php";
$templateParams["posts"] = $dbh->getPostsbyId(1);

require 'template/base.php';
?>