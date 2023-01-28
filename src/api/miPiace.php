<?php 
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $idPost = $_POST["postId"];
    $remove = false;
    if(isset($_POST["remove"])) {
        $remove = $_POST["remove"];
    }

    if($remove){
        $dbh->decrementLikesById($idPost);
    }
    else {
        $dbh->incrementLikesById($idPost);
    }
    $result["likes"] = $dbh->getLikesByPostId($idPost);

    header('Content-Type: application/json');
    echo json_encode($result);
?>