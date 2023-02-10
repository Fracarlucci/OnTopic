<?php
require_once 'base-elements.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Modifica Post";
$templateParams["contenuto"] = "modifica-post-template.php";
array_push($templateParams["js"], "js/modificaPost.js");

require 'template/base.php';
?>