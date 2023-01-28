<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["post"] = "post-template.php";
$templateParams["notifiche"] = $dbh->getNotificationsById(1);
$templateParams["amici"] = $dbh->getUserFriendsById(1);
$templateParams["utente"] = $dbh->getUserById(1);
$templateParams["js"] = array("js/miPiace.js");
?>