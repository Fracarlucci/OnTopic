<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $username = $_POST["username"];
    $type = $_POST["listType"];
    $userId = $dbh->getUsersByUsername($username);

    if($type == "Seguaci"){
        $result = $dbh->getSeguaciById($userId);
    } else if($type == "Seguiti"){
        $result = $dbh->getSeguitiById($userId);
    }

    if(empty($result)){
        $result = false;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>