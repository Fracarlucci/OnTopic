<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $userId = $_POST["userId"];

    //controllo il follow dell'utente loggato ad un particolare utente
    $followed = $dbh->checkFollow($_SESSION["user_id"], $userId);  // ($_SESSION["id"], $userId)

    if(empty($followed)){
        $result["followed"] = false;
    } else {
        $result["followed"] = true;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>