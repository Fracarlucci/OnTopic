<?php 
    include '../db/database.php';
    include '../utils/functions.php';

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

    if(isset($_POST["immagine"])) {
        $immagine = $_POST["immagine"];
        $dbh->updateUserWithImg($userId, $username, $email, $nome, $cognome, $immagine);
    } else {
        $dbh->updateUserWithoutImg($userId, $username, $email, $nome, $cognome);
    }

?>