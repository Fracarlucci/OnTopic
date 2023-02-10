<?php
require_once 'base-elements.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Theme";
$templateParams["contenuto"] = "topic-post.php";
$templateParams["amici-section"] = "lista-amici.php";

$currDay = date('Y-m-d');
$templateParams["temaDelGiorno"] = $dbh->getThemeOfTheDay($currDay);

if(isset($templateParams["temaDelGiorno"][0])){
    $tema = $templateParams["temaDelGiorno"][0]["nome"];
    $templateParams["postOTD"] = $dbh->getPostsByTheme($tema);
}

require 'template/base.php';
?>