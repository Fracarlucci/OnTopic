<?php 
   include '../db/database.php';
   include '../utils/functions.php';

   $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
   $result["notificationStatus"] = false;

   if(isset($_POST["type"], $_POST["text"], $_POST["sender"], $_POST["receiver"])) { 
         //add notification to db
         if($dbh->insertNotification($_POST["type"], $_POST["text"], $_POST["type"] != "follow" ? $_POST["post"] : NULL, $_POST["sender"], $_POST["receiver"])) {
            //get sender username and receiver email
            $sender = $dbh->getUserById($_POST["sender"])[0];
            $receiver = $dbh->getUserById($_POST["receiver"])[0];
            if($sender && $receiver) {
               //send notification via email
               if(sendNotificationEmail($sender["username"], $receiver["email"], $_POST["type"])) {
                  //ok
                  $result["notificationStatus"] = true;
               }
            }
        }
   } else { 
      // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
      $result["erroreNotification"] = "Richiesta non valida";
   }

   header('Content-Type: application/json');
   echo json_encode($result);

?>