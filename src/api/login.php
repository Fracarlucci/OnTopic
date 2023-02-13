<?php 
   include '../db/database.php';
   include '../utils/functions.php';

   sec_session_start();

   $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
   $result["logineseguito"] = false;

   //effettua il login
   if(isset($_POST['username'], $_POST['password'])) { 
      $username = $_POST['username'];
      $password = $_POST['password'];
      if(login($username, $password, $dbh) == true) {
         // Login eseguito
         $result["logineseguito"] = true;
      } else {
         // Login fallito
         $result["errorelogin"] = "Username e/o password errati";
      }
   } else { 
      // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
      $result["errorelogin"] = "Richiesta non valida";
   }

   header('Content-Type: application/json');
   echo json_encode($result);

?>