<?php
require_once 'bootstrap.php';

//check user auth
$templateParams["isAuth"] = login_check($dbh->db);

//Base Template
$templateParams["post"] = "post-template.php";

if ($templateParams["isAuth"]) {
    $userId = $_SESSION["user_id"];
    $templateParams["notifiche"] = $dbh->getNotificationsById($userId);
    $templateParams["seguiti"] = $dbh->getSeguitiById($userId);
    $templateParams["utente"] = $dbh->getUserById($userId);
}

$templateParams["js"] = array("js/miPiace.js", "js/commentsList.js", "js/insertComment.js",
    "components/comments-modal/comments-modal.js", "components/postSettings-modal/postSettings-modal.js", "js/deletePost.js", "utils/functions.js");

require_once './components/comments-modal/comments-modal.php';
require_once './components/postSettings-modal/postSettings-modal.php';
?>