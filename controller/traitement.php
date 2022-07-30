<?php


if (isset($_POST['searchPHP'])) {

 
  $s=htmlspecialchars(trim( $_POST['searchPHP']));
  $search=$bdd->prepare("SELECT * FROM pizzas   LIKE '%$q%'");
  $search->execute();
  
 

  
  $fetch=$search>fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($fetch2);


  
}
 

?>