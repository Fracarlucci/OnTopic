<?php
require_once 'base-without-posts.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Add post";
$templateParams["contenuto"] = "aggiungi-post.php";

$currDay = date('Y-m-d');
$templateParams["temaDelGiorno"] = $dbh->getThemeOfTheDay($currDay);

require 'template/base.php';
?>