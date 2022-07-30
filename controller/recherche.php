<?php


if (isset($_POST['searchPHP'])) {

  try{
    $bdd = new PDO('mysql:host=localhost;dbname=paco', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
  }
  catch (PDOException $e) {
      echo 'Echec de la connexion : ' . $e->getMessage();
      
  }

  $q=htmlspecialchars(trim( $_POST['searchPHP']));
  $stmt=$bdd->prepare
    ("SELECT * FROM pizzas WHERE pizzas.description LIKE '%$q%' 
    || pizzas.nom LIKE '%$q%' ");
  $stmt->execute();


  $fetch=$stmt->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($fetch);


  
}
 

?>