<?php 
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $idPost = $_POST["postId"];

    // if(isset($_SESSION["id"])){}
    $liked = $dbh->getLikesByPostIdAndUserId($idPost, 1);

    if(empty($liked)){
        $result["isLiked"] = false;
    } else {
        $result["isLiked"] = true;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>