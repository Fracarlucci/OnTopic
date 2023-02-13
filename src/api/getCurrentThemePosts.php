<?php
    include_once '../db/database.php';
    include_once '../utils/functions.php';
    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

    sec_session_start();

    $loggedUserId = $_SESSION["user_id"];
    $templateParams["isAuth"] = true;
    $templateParams["post"] = "../template/post-template.php";
    $currDay = date('Y-m-d');

    //ritorna i post di un determinato tema (in base alla data nei cookie)
    if(isset($_COOKIE['date'])) {
        $date = $_COOKIE['date'];
        $templateParams["temaDelGiorno"] = $dbh->getThemeOfTheDay($date);
    }

    if(isset($templateParams["temaDelGiorno"][0])){
        $tema = $templateParams["temaDelGiorno"][0]["nome"];
        $templateParams["postOTD"] = $dbh->getPostsByTheme($tema);
    }
    $currentDay = strtotime($currDay);
    $selectedDay = strtotime($date);
    if(isset($templateParams["postOTD"][0])){
        foreach($templateParams["postOTD"] as $post):
            require $templateParams["post"];
        endforeach;
    }else if($selectedDay > $currentDay){
?>
    <h1 class="noPost">Coming soon...</h1>
<?php 
    }else{
?>
    <h1 class="noPost">Nessun post per questo tema</h1>
<?php 
    }
?>