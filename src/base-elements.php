<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["post"] = "post-template.php";
$templateParams["notifiche"] = $dbh->getNotificationsById(4);
$templateParams["seguiti"] = $dbh->getSeguitiById(1);
$templateParams["utente"] = $dbh->getUserById(1);
$templateParams["js"] = array("js/miPiace.js", "js/commentsList.js", "js/insertComment.js", "components/comments-modal/comments-modal.js", "utils/functions.js", "js/search.js");

require_once './components/comments-modal/comments-modal.php';
?>