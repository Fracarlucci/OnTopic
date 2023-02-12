<?php
require_once 'bootstrap.php';

//check user auth
$templateParams["isAuth"] = login_check($dbh->db);

if ($templateParams["isAuth"]) {
    $loggedUserId = $_SESSION["user_id"];
    $templateParams["notifiche"] = $dbh->getNotificationsById($loggedUserId);
    $templateParams["loggedUserSeguiti"] = $dbh->getSeguitiById($loggedUserId);
    $templateParams["utente"] = $dbh->getUserById($loggedUserId);
}

$templateParams["js"] = array("js/notificationsHandle.js", "utils/functions.js");

?>