<?php
require_once 'base-elements.php';

$templateParams["titolo"] = "OnTopic - Cerca";
$templateParams["contenuto"] = "cerca-template.php";
$templateParams["amici-section"] = "lista-amici.php";

$templateParams["js"] = array("js/search.js");
require 'template/base.php';
?>