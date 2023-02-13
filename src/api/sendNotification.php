<?php 
   include '../db/database.php';
   include '../utils/functions.php';

   sec_session_start();

   $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
   $result["notificationStatus"] = false;

   //inserisce la notifica sul db per visualizzarla nel sito, invia la notifica email al destinatario
   if(isset($_POST["type"], $_POST["sender"], $_POST["receiver"]) && ($_POST["sender"] != $_SESSION["user_id"])) { 
         //get sender username and receiver email
         $sender = $dbh->getUserById($_POST["sender"])[0];
         //add notification to db
         if($dbh->insertNotification($_POST["type"], composeMessage($_POST["type"], $sender["username"]), $_POST["type"] != "follow" ? $_POST["post"] : NULL, $_POST["sender"], $_POST["receiver"])) {
            //get receiver email
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

   function composeMessage($type, $senderUsername) {
      $messages = [
         "follow" => "L'utente <strong>" . $senderUsername . "</strong> ha iniziato a seguirti",
         "like" => "L'utente <strong>" . $senderUsername . "</strong> ha messo mi piace ad un tuo post",
         "comment" => "L'utente <strong>" . $senderUsername . "</strong> ha commentato un tuo post"
     ];
     return $messages[$type];
   }

?>