<?php 
   include '../db/database.php';
   include '../utils/functions.php';

   $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
   $result["notificationStatus"] = false;

   var_dump($_POST);

   if(isset($_POST["type"], $_POST["text"], $_POST["sender"], $_POST["receiver"])) { 
        if($dbh->insertNotification($_POST["type"], $_POST["text"], $_POST["type"] != "follow" ? $_POST["post"] : NULL, $_POST["sender"], $_POST["receiver"])) {
            sendNotificationEmail($_POST["sender"], "hurricaneshotz@gmail.com", $_POST["type"]);
            $result["notificationStatus"] = true;
        }
   } else { 
      // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
      $result["erroreNotification"] = "Richiesta non valida";
   }

   header('Content-Type: application/json');
   echo json_encode($result);

?>