<?php
    include '../db/database.php';

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $input = $_POST["input"];

    //controlla se esiste un particolare utente, in caso esista ritorna i dati dell'utente
    $result = $dbh->searchUser($input);

    if(empty($result)){
        $result = false;
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>