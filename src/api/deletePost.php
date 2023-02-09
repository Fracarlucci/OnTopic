<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $postId = $_POST["postId"];
    
    $result = $dbh->deletePostById($postId);
    
    header('Content-Type: application/json');
    echo json_encode($result);
?>