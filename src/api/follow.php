<?php 
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $username = $_POST["username"];
    $remove = false;
    if(isset($_POST["remove"])) {
        $remove = $_POST["remove"];
    }

    $userId = $dbh->getUsersByUsername($username);

    if($remove){
        $dbh->unfollowUser(2, $userId);   // ($_SESSION["id"], $userId)
    } else {
        $dbh->followUser(2, $userId);     // ($_SESSION["id"], $userId)
    }
    $result["seguaci"] = count($dbh->getSeguaciById($userId));

    header('Content-Type: application/json');
    echo json_encode($result);
?>