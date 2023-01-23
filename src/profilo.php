<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "OnTopic - Profilo";
$templateParams["contenuto"] = "profilo-content.php";
$templateParams["post"] = "post-template.php";
$templateParams["notifiche"] = $dbh->getNotificationsById(1);
$templateParams["amici"] = $dbh->getUserFriendsById(1);
$templateParams["utente"] = $dbh->getUserById(1);
$templateParams["posts"] = $dbh->getPostsbyId(1);

require 'template/base.php';
?>