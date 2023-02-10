<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $notificationId = $_POST["id"];
    
    $result = $dbh->deleteNotificationById($notificationId);
    
    header('Content-Type: application/json');
    echo json_encode($result);
?>