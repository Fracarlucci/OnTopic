<?php
require_once 'base-without-posts.php';

//redirect if not auth
if(!$templateParams["isAuth"] || !isset($_GET["id"]) || $loggedUserId != $_GET["id"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Impostazioni";
$templateParams["contenuto"] = "impostazioni-template.php";
array_push($templateParams["js"], "js/impostazioni.js");

require 'template/base.php';
?>