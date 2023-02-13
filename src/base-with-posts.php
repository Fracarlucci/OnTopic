<?php
require_once 'bootstrap.php';

//check user auth
$templateParams["isAuth"] = login_check($dbh->db);

//Base Template
$templateParams["post"] = "post-template.php";

if ($templateParams["isAuth"]) {
    $loggedUserId = $_SESSION["user_id"];
    $templateParams["notifiche"] = $dbh->getNotificationsById($loggedUserId);
    $templateParams["loggedUserSeguiti"] = $dbh->getSeguitiById($loggedUserId);
    $templateParams["utente"] = $dbh->getUserById($loggedUserId);

    $templateParams["js"] = array("js/notificationsHandle.js", "js/miPiace.js", "js/commentsList.js", "js/insertComment.js",
    "components/comments-modal/comments-modal.js", "components/postSettings-modal/postSettings-modal.js", "js/postSettings.js", "utils/functions.js");
} else {
    $templateParams["js"] = array("utils/functions.js");
}

require_once './utils/functions.php';
?>