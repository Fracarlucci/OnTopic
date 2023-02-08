<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $input = $_POST["input"];
    // $postId = $_POST["postId"];
    $result = $dbh->insertComment($input, 1, 2);  // $postId, _SESSION["userId"]

    header('Content-Type: application/json');
    echo json_encode($result);
?>