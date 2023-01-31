<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Theme";
$templateParams["contenuto"] = "topic-post.php";
$templateParams["postOTD"] = $dbh->getPostsByTheme(1);

require 'template/base.php';
?>