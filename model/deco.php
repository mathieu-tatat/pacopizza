<?php 
  //démarer la session
 
session_start();

session_unset();
  //destruction de toute les sessions
   session_destroy();
   // redirection vers la page de connexion
   header("Location:../connexion.php");

  
?>