<?php
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    //redirect if not auth
    if(!login_check($dbh->db)){
        header('Location: ./../index.php');
    }

    $input = $_POST["input"];
    $postId = $_POST["postId"];
    $result["status"] = $dbh->insertComment($input, $postId, $_SESSION["user_id"]);  // $postId, _SESSION["userId"]
   
    $result["senderId"] = $_SESSION["user_id"];
    $result["receiverId"] = $dbh->getPostById($postId)[0]["userId"];

    header('Content-Type: application/json');
    echo json_encode($result);
?>