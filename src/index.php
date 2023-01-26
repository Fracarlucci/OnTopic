<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "OnTopic - Home";
$templateParams["contenuto"] = "lista-post.php";
$templateParams["post"] = "post-template.php";
$templateParams["amici-section"] = "lista-amici.php";
$templateParams["notifiche"] = $dbh->getNotificationsById(1);
$templateParams["amici"] = $dbh->getUserFriendsById(1);
$templateParams["utente"] = $dbh->getUserById(1);

$templateParams["js"] = array("js/miPiace.js");

require 'template/base.php';
?>