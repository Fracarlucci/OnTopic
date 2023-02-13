<?php 
    include '../db/database.php';
    include '../utils/functions.php';

   $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

   //redirect if not auth
   if(!login_check($dbh->db)){
        header('Location: ./../index.php');
    }

   $postId = $_POST["postId"];

   //elimina una determinata immagine dal file system (img post)
   $dbh->removePostImage($postId);

   header('Content-Type: application/json');
   echo json_encode($result);

?>