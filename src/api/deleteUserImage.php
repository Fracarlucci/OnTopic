<?php 
   include '../utils/functions.php';

   $result["deleteEseguito"] = false;

   if(isset($_POST["image"])) { 
        deleteFileIfExists("../img/", $_POST["image"]);
        $result["deleteEseguito"] = true;
   } else { 
      // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
      $result["erroreDelete"] = "Richiesta non valida";
   }

   header('Content-Type: application/json');
   echo json_encode($result);

?>