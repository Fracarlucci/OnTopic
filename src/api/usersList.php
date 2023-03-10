<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $userId = $_POST["userId"];
    $type = $_POST["listType"];

    //ritorna la lista dei seguiti o dei seguaci (in base al body della req)
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