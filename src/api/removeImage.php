<?php 
    include '../db/database.php';

   $dbh = new DatabaseHelper("localhost", "root", "", "ontopic", 3306);

   //redirect if not auth
   if(!login_check($dbh->db)){
        header('Location: ./../index.php');
    }

   $postId = $_POST["postId"];

   $dbh->removePostImage($postId);

   header('Content-Type: application/json');
   echo json_encode($result);

?>