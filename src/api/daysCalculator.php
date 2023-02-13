<small>
    <?php 
        include '../db/database.php';
     
        $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
        $date = $dbh->getDays($_REQUEST["currentDay"], $_REQUEST["currentMonth"], $_REQUEST["currentYear"]); 
        if(isset($date[0]["day_name"])){
            echo $date[0]["day_name"];
        }else{
            echo "..";
        }
    ?>
    <br/>
</small>
<strong>
    <?php 
        if(isset($date[0]["day"])){ 
            echo $date[0]["day"];
        }else{
            echo "?";
        }
    ?>
    <br/>
    <?php 
        if(isset($date[0]['month_name'])){
            echo $date[0]['month_name'];
        }else{
            echo "..";
        }
    ?>
</strong>