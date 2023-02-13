<?php
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    //redirect if not auth
    if(!login_check($dbh->db)){
        header('Location: ./../index.php');
    }


    $notificationId = $_POST["id"];
    
    //disabilita la visualizzazione di una particolare notifica
    $result = $dbh->deleteNotificationById($notificationId);
    
    header('Content-Type: application/json');
    echo json_encode($result);
?>