<?php 
   include '../db/database.php';
   include '../utils/functions.php';

   sec_session_start();

   $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);
   $result["signinEseguito"] = false;

   //inserisco l'utente nel db se non esiste già (username univoco)
   if(isset($_POST['username'], $_POST['password'], $_POST["name"], $_POST["surname"], $_POST["email"], $_POST["image"])) { 
      //eseguo l'hash della password e genero il sale
      $salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
      // Crea una password usando la chiave appena creata.
      $password = hash('sha512', $_POST["password"] . $salt);
      //controllo se esiste un utente con lo stesso user, altrimenti esegui l'inserimento
      if($dbh->getUsersByUsername($_POST["username"])) {
        $result["erroreSignin"] = "Username già in uso";
      } else if($dbh->insertUser($_POST['name'], $_POST['surname'], $_POST["username"], $_POST["email"], $password, $salt, $_POST["image"])) {
         $result["signinEseguito"] = true;
      }
   } else { 
      // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
      $result["erroreSignin"] = "Richiesta non valida";
   }

   header('Content-Type: application/json');
   echo json_encode($result);

?>