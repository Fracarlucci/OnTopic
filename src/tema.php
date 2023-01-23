<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "OnTopic - Theme";
$templateParams["contenuto"] = "topic-post.php";
$templateParams["notifiche"] = $dbh->getNotificationsById(1);
$templateParams["amici"] = $dbh->getUserFriendsById(1);
$templateParams["utente"] = $dbh->getUserById(1);
$templateParams["postOTD"] = $dbh->getPostsByTheme(1);

require 'template/base.php';
?>