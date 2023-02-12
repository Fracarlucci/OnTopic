<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    //redirect if not auth
    if(!login_check($dbh->db)){
        header('Location: ./../index.php');
    }

    $postId = $_POST["postId"];
    $testo = $_POST["testo"];
    
    if(isset($_POST["immagine"])) {
        $immagine = $_POST["immagine"];
        $dbh->updatePostWithImg($postId, $testo, $immagine);
    } else {
        $dbh->updatePostWithoutImg($postId, $testo);
    }
?>