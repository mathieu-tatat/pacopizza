<?php 
require('model/users.php');

    class UserController{

        public function verification(){

            if(isset($_POST['button_con'])){

                if (empty($_POST['email'])|| empty ($_POST['mdp'])) { ?>
                    <p class="alertMsg">Veuillez remplir tout les champs. </p>
                <?php } ?>
                <?php 
                $modelUser= new Utilisateur;
                $verif = $modelUser->checkEmail(trim( htmlentities($_POST['email'])));

                if($verif < 1){ ?>
                    <p class="alertMsg"> Aucun utilisateur ne possède cet email. </p>
                <?php }else{ ?>
                   <?php $modelUsers= new Utilisateur;
                    $connexionUser = $modelUsers->selectUser($_POST['email']);
                    if(password_verify(htmlspecialchars($_POST['mdp'],ENT_QUOTES,"ISO-8859-1"),
                        $connexionUser['password'])){

                        $_SESSION['user'] = $connexionUser;
                         header('Location: profil.php');
                    }else{ ?>
                        <p class="alertMsg">login ou password incorect. </p>
                        <?php
                    }
                  
                    
                } 
                
            }

        }

    public function createUser(){
        if(isset($_POST['button_inscri'])){
            if (empty($_POST['nom'])|| empty ($_POST['prenom']) 
                || empty ($_POST['email']) 
                || empty ($_POST['password']) 
                || empty ($_POST['passwordConf'])) {
                echo"veuillez remplir tout les champs";
            }elseif($_POST['password'] != $_POST['passwordConf']){
                echo"Password et confirmation sont differents";
            }elseif(strlen($_POST['password']< 8)){
                echo"le mot de passe doit faire 8 characteres minimum. ";
            }
            $modelUser= new Utilisateur;
                $verif = $modelUser->checkEmail(trim( htmlentities($_POST['email'])));
                if($verif>0){
                    echo"email existant. ";
                }else {
                    $nom = htmlentities($_POST['nom']);
                    $prenom = htmlentities($_POST['prenom']);
                    $email = htmlentities($_POST['email']);
                    $password = htmlentities(password_hash($_POST['password'],PASSWORD_BCRYPT));
                    $inscription = new Utilisateur;
                    $inscription->inscription($nom,$prenom,$email,$password);
                    header('Location: connexion.php');
                }
                
        }
    }
    public function delete(){
        
        if(isset($_POST['button_delete_profil'])){

            $deleteUser = new Utilisateur;
            $id = $_SESSION['user']['id_user'];
            $deleteUser->deleteUser($id);
            session_destroy();
            header('Location: model/deco.php');
            // redirection vers la page de connexion
            echo "votre compte a bien était supprimé. ";
            
        }
    }

    public function updateUser(){

        if(isset($_POST['button_update_profil'])){
            
                if(empty($_POST['nom'])){
                echo"le nom ne peut pas etre vide. ";
                }

                if(empty($_POST['prenom'])){
                echo"le prenom ne peut pas etre vide. ";
                }

                if(empty($_POST['email'])){
                echo"l'email ne peut pas etre vide. ";
                }

                if($_SESSION['user']['password'] !== $_POST['mdp1']){
                echo"le mot de passe actuel ne correspond pas à celui du compte. ";
                }
            

                if($_POST['newmdp'] !== $_POST['newmdp2']){
                echo"le nouveaux mot de passe  ne correspond pas à la confirmation. ";
                }
                elseif(strlen($_POST['newmdp'] < 8)){
                    echo"le mot de passe doit faire 8 characteres minimum. ";
                }

            $userUpdate = new Utilisateur;
            $id = $_SESSION['user']['id_user'];
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email= htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['mdp1']);
            $newMDP = htmlspecialchars(password_hash($_POST['newmdp'], PASSWORD_BCRYPT));
            $newMDP2 = htmlspecialchars($_POST['newmdp2']);
            $sessionPass = $_SESSION['user']['password'];
            $id_droit = 1; 

                $_SESSION['user']['nom']=$nom;
                $_SESSION['user']['prenom']=$prenom;
                $_SESSION['user']['email']=$email;
                $sessionPass = htmlspecialchars($newMDP);
                $userUpdate->updateUser($id,$nom,$prenom,$email,$newMDP,$id_droit);
                header('Location: #');
                echo"Modifications bien prises en compte";
               

        }
    }
}
?>