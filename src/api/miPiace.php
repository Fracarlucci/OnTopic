<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $idPost = $_POST["postId"];
    $remove = false;
    if(isset($_POST["remove"])) {
        $remove = $_POST["remove"];
    }

    if($remove){
        $dbh->decrementLikesById($idPost);
        $dbh->removeLike($idPost, $_SESSION["user_id"]);
    } else {
        $dbh->incrementLikesById($idPost);
        $dbh->insertLike($idPost, $_SESSION["user_id"]);
    }
    $result["likes"] = $dbh->getLikesByPostId($idPost);

    header('Content-Type: application/json');
    echo json_encode($result);
?>