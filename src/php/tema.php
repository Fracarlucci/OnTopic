<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["titolo"] = "OnTopic - Home";
$templateParams["contenuto"] = "topic-post.php";
$templateParams["notifiche"] = $dbh->getNotificationsById($_SESSION["idUtente"]);
$templateParams["amici"] = $dbh->getUserFriendsById($_SESSION["idUtente"]);

require 'template/base.php';
?>