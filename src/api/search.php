<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $input = $_POST["input"];
    $result["user"] = $dbh->searchByUsername($input);

    if(empty($result["user"])){
        $result["user"] = false;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>