<?php 
require('model/commentaire.php');

    class ComController{

        //////// le click du button com declenche la methode d'insertion d'un commentaire ////////// 
    public function commenter(){
        if(isset($_POST['button_com'])){
            if(empty($_POST['com_general'])){
                echo"veuillez remplir le champs commentaire";
                }
            $modelCom = new Commentaire;

                    $com = htmlentities($_POST['com_general']);
                    $user = htmlentities($_SESSION['user']['prenom']);

                    $commentaire = new Commentaire;
                    $commentaire ->insertCom($user,$com);
                    header('Location: #');
             
       }         
    }    
}
?>