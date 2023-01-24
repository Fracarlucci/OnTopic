<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "OnTopic - Cerca";
$templateParams["contenuto"] = "cerca-template.php";
$templateParams["amici-section"] = "lista-amici.php";
$templateParams["notifiche"] = $dbh->getNotificationsById(1);
$templateParams["amici"] = $dbh->getUserFriendsById(1);
$templateParams["utente"] = $dbh->getUserById(1);
// $templateParams["risultati"] = $dbh->searchUsers();

require 'template/base.php';
?>