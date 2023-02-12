<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $userId = $_SESSION["user_id"];
    $topicId = $dbh->getThemeId($_POST['tema']);
    $testo = $_POST['testo'];

    if(isset($_POST['image'])) {
        $immagine = $_POST['image'];
        if(isset($testo)){
            $dbh->insertPost($testo, $immagine, $topicId, $userId);
        }else{
            $dbh->insertPost(null, $immagine, $topicId, $userId);    
        }
    }else{
        $dbh->insertPost($testo, null, $topicId, $userId);
    }
    array_push($templateParams["js"], "js/addPost.js");

?>