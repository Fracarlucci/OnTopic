<?php
require_once 'bootstrap.php';

//Base Template
$templateParams["post"] = "post-template.php";
$templateParams["notifiche"] = $dbh->getNotificationsById(4);
$templateParams["seguiti"] = $dbh->getSeguitiById(1);
$templateParams["utente"] = $dbh->getUserById(1);
$templateParams["js"] = array("js/miPiace.js", "js/commentsList.js", "js/insertComment.js",
    "components/comments-modal/comments-modal.js", "components/postSettings-modal/postSettings-modal.js", "js/deletePost.js", "utils/functions.js");

require_once './components/comments-modal/comments-modal.php';
require_once './components/postSettings-modal/postSettings-modal.php';
?>