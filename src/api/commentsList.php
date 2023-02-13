<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $postId = $_POST["postId"];

    //ritorna i commenti di un determinato post
    $result = $dbh->getCommentsByPostId($postId);

    if(empty($result)){
        $result = false;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>