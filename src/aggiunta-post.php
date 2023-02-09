<?php
require_once 'base-elements.php';

//redirect if not auth
if(!$templateParams["isAuth"]){
    header('Location: index.php');
}

$templateParams["titolo"] = "OnTopic - Add post";
$templateParams["contenuto"] = "aggiungi-post.php";
$templateParams["amici-section"] = "lista-amici.php";



require 'template/base.php';
?>