<small>
    <?php 
        include '../db/database.php';
     
        $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
        $date = $dbh->getDays($_REQUEST["currentDay"], $_REQUEST["currentMonth"], $_REQUEST["currentYear"]); 
        echo $date[0]["day_name"] ;
    ?>
    <br/>
</small>
<strong>
    <?php echo $date[0]["day"]; ?>
    <br/>
    <?php echo $date[0]['month_name'];?>
</strong>