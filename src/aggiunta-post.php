<?php
require_once 'base-elements.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Add post";
$templateParams["contenuto"] = "aggiungi-post.php";

$currDay = date('Y-m-d');
$templateParams["temaDelGiorno"] = $dbh->getThemeOfTheDay($currDay);

$templateParams["photoPost"] = null;

require 'template/base.php';
?>