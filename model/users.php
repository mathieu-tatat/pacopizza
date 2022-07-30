<?php


require_once 'model.php';

class Utilisateur extends Db  {

    
    public $nom;    
    public $prenom;   
    public $password;
    public $email;
    public $id;
   
    
    function __construct(){
        Db::__construct();
    }

    ////////////// selectionne un utilisateur par son mail ///////////
    public function selectUser($email){
        $selectUserEmail= $this->db->prepare("SELECT * FROM utilisateurs WHERE email = :email");
        $selectUserEmail->execute(array(':email'=>$email));
        $utilisateur= $selectUserEmail -> fetch(PDO::FETCH_ASSOC);
        return $utilisateur;
    }


    /////////////check si un email est deja present en base de donnée ///////////
    public function checkEmail($email){
        $checkEmail=  $this->db->prepare("SELECT email FROM utilisateurs WHERE email = :email");
        $checkEmail->execute(array(':email'=>$email));
        $verif=$checkEmail-> rowCount();
        return $verif;
    }

    //////////// permet l'inscription de l'utilisateur //////// 
    public function inscription($nom,$prenom,$email,$password){
        $insertUser= $this->db->prepare("INSERT INTO utilisateurs(nom, prenom, email, password, id_droit) VALUES (:nom , :prenom,  :email, :password, 1)");
        $insertUser->execute(array(':nom'=>$nom, ':prenom'=>$prenom,  ':email'=>$email, ':password'=>$password ));
    }

    /////////////// supression d'un utilisateur //////////////
    public function deleteUser($id){
    $deleteUserById = $this->db->prepare("DELETE FROM utilisateurs WHERE id_user = :id ");
    $deleteUserById->execute(array(':id'=>$id));

    }

    /////////// mise a jour des informations utilisateurs /////////
    public function updateUser($id,$nom,$prenom,$email,$newMDP,$id_droit){
        $modifyUser = $this->db->prepare("UPDATE utilisateurs SET id_user = :id, nom = :nom, prenom = :prenom, email = :email, password = :newMDP, id_droit = :id_droit WHERE id_user = :id ");
        $modifyUser->execute(array(':id'=>$id, ':nom'=>$nom,':prenom'=>$prenom,':email'=>$email,':newMDP'=>$newMDP, ':id_droit'=>$id_droit));
       
    }
}