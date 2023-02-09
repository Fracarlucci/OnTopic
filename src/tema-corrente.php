<?php
    include_once './db/database.php';
    include_once './utils/functions.php';
    $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
    
    sec_session_start();
    $templateParams["isAuth"] = login_check($dbh->db);
    
    $templateParams["post"] = "./template/post-template.php";

    if(isset($_COOKIE['date'])) {
        $date = $_COOKIE['date'];
        $templateParams["temaDelGiorno"] = $dbh->getThemeOfTheDay($date);
    }

    if(isset($templateParams["temaDelGiorno"][0])){
        $tema = $templateParams["temaDelGiorno"][0]["nome"];
        $templateParams["postOTD"] = $dbh->getPostsByTheme($tema);
    }

    if(isset($templateParams["postOTD"][0])){
        foreach($templateParams["postOTD"] as $post):
            require $templateParams["post"];
        endforeach;
    }else{
?>
    <h1 class="noPost">Coming soon...</h1>
<?php 
    }
?>