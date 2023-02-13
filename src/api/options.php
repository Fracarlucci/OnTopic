<?php 
    include '../db/database.php';
    include '../utils/functions.php';

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    //redirect if not auth
    if(!login_check($dbh->db)){
        header('Location: ./../index.php');
    }

    $userId = $_POST["userId"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];

    $result["status"] = false;

    if(isset($_POST["immagine"])) {
        $immagine = $_POST["immagine"];
        $result["status"] = $dbh->updateUserWithImg($userId, $username, $email, $nome, $cognome, $immagine);
    } else {
        $result["status"] = $dbh->updateUserWithoutImg($userId, $username, $email, $nome, $cognome);
    }

    header('Content-Type: application/json');
    echo json_encode($result);
?>