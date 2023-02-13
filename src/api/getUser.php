<?php 
    include '../db/database.php';
    
    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $userId = $_POST["userId"];

    $result = $dbh->getUserById($userId);

    header('Content-Type: application/json');
    echo json_encode($result);
?>