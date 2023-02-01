<?php 
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $username = $_POST["username"];

    $userId = $dbh->getUsersByUsername($username);
    $followed = $dbh->checkFollow(2, $userId);  // ($_SESSION["id"], $userId)

    if(empty($followed)){
        $result["followed"] = false;
    } else {
        $result["followed"] = true;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>