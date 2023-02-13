<?php 
    include '../db/database.php';
    include "../utils/functions.php";

    sec_session_start();

    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    $userId = $_SESSION["user_id"];
    $testo = $_POST['testo'];
    $immagine = $_POST['image'];

    $currDay = date('Y-m-d');
    $tema = $dbh->getThemeOfTheDay($currDay);
    $topicId = $dbh->getThemeId($tema[0]["nome"]);

    //inserisce nuovo post (con immagine nullable)
    if(isset($_POST['image'])) {
        if(isset($testo)){
            $dbh->insertPost($testo, $immagine, $topicId[0]["id"], $userId);
        }else{
            $dbh->insertPost(null, $immagine, $topicId[0]["id"], $userId);    
        }
    }else if($testo != null){
        $dbh->insertPost($testo, null, $topicId[0]["id"], $userId);
    }
    
?>