<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Cerca";
$templateParams["contenuto"] = "cerca-template.php";
array_push($templateParams["js"], "js/search.js");

require 'template/base.php';
?>