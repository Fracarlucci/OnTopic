<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "OnTopic - Home";
// $templateParams["contenuto"] = "lista-articoli.php";
$templateParams["notifiche"] = $dbh->getNotificationsById($_SESSION["idUtente"]);
$templateParams["amici"] = $dbh->getUserFriendsById($_SESSION["idUtente"]);
//Home Template
// $templateParams["articoli"] = $dbh->getPosts(2);

require 'template/base.php';
?>