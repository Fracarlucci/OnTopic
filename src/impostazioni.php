<?php
require_once 'base-without-posts.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Impostazioni";
$templateParams["contenuto"] = "impostazioni-template.php";
array_push($templateParams["js"], "js/impostazioni.js");

require 'template/base.php';
?>