<?php 
   include '../utils/functions.php';

   $result["uploadEseguito"] = false;

   //carico img nel filesystem
   if(isset($_FILES['image'])) { 
    $uploadResult = uploadImage("../img/", $_FILES["image"]);
    if($uploadResult[0]) {
        $result["uploadEseguito"] = true;
        $result["fileName"] = $uploadResult[1];
    } else {
        $result["erroreUpload"] = "Upload immagine non riuscito";
    }
   } else { 
      // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
      $result["erroreUpload"] = "Richiesta non valida";
   }

   header('Content-Type: application/json');
   echo json_encode($result);

?>