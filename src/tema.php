<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Theme";
$templateParams["contenuto"] = "topic-post.php";
$templateParams["amici-section"] = "lista-amici.php";
$templateParams["postOTD"] = $dbh->getPostsByTheme(1);

require 'template/base.php';
?>