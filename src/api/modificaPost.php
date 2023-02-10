<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $postId = $_POST["postId"];
    $testo = $_POST["testo"];
    if(isset($_POST["immagine"])) {
        $immagine = $_POST["immagine"];
    }
    echo "DIOPO";
    $dbh->updatePostById($postId, $testo, $immagine);

    header('Content-Type: application/json');
    echo json_encode($result);
?>