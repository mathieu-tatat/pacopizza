<?php 
require('model/avis.php');

    class AvisController{

    //////// le click du button avis declenche la methode d'insertion d'un avis ////////// 
    public function avis(){
        if(isset($_POST['button_avis'])){
            if(empty($_POST['avis_box'])){
                echo"veuillez remplir le champs commentaire";
                }
            $modelAvis = new Avis;

                    $avis= htmlentities($_POST['avis_box']);
                    $user = htmlentities($_SESSION['user']['prenom']);
                    $pizzaId = $_GET['id_pizza'];
                    
                    $depoAvis = new Avis;
                    $depoAvis ->insertAvis($user,$avis,$pizzaId);
                    header('Location: #');
             
       }         
    }    
}
?>