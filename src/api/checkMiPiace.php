<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $idPost = $_POST["postId"];

    $liked = $dbh->getLikesByPostIdAndUserId($idPost, $_SESSION["user_id"]);

    if(empty($liked)){
        $result["isLiked"] = false;
    } else {
        $result["isLiked"] = true;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>