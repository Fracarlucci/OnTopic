<h1>
    <?php 
        include_once '../db/database.php';
        $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
        
        //ritorna i dati del topic per la data salvata nei cookie
        if(isset($_COOKIE['date'])) {
            $date = $_COOKIE['date'];
            $templateParams["temaDelGiorno"] = $dbh->getThemeOfTheDay($date);
            if(isset($templateParams["temaDelGiorno"][0])){
                echo $templateParams["temaDelGiorno"][0]['nome'];
            }
        }else{
            echo "";
        }
    ?>
</h1>