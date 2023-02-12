<?php
require_once 'base-with-posts.php';

$templateParams["titolo"] = "OnTopic - Home";
$templateParams["contenuto"] = $templateParams["isAuth"] ? "lista-post-seguiti.php" : "lista-post-nocorporate.php";

require 'template/base.php';
?>