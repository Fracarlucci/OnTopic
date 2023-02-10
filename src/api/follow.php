<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $userId = $_POST["userId"];
    $remove = false;
    if(isset($_POST["remove"])) {
        $remove = $_POST["remove"];
    }

    if($remove){
        $dbh->unfollowUser($_SESSION["user_id"], $userId);   // ($_SESSION["id"], $userId)
    } else {
        $dbh->followUser($_SESSION["user_id"], $userId);     // ($_SESSION["id"], $userId)
    }
    $result["seguaci"] = count($dbh->getSeguaciById($userId));
    $result["senderId"] = $_SESSION["user_id"];

    header('Content-Type: application/json');
    echo json_encode($result);
?>