<?php
require_once 'base-elements.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Cerca";
$templateParams["contenuto"] = "cerca-template.php";
array_push($templateParams["js"], "js/search.js");

require 'template/base.php';
?>