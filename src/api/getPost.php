<?php 
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $postId = $_POST["postId"];

    //ritorna il post in base all'id
    $result = $dbh->getPostById($postId); 

    header('Content-Type: application/json');
    echo json_encode($result);
?>