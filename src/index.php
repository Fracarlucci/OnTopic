<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Home";
$templateParams["contenuto"] = $templateParams["isAuth"] ? "lista-post-seguiti.php" : "lista-post-nocorporate.php";

require 'template/base.php';
?>