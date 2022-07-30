<?php


require_once 'model.php';

////////////// La class commentaire sert a donner son avis generale sur l'établissement ///////////
class Commentaire extends Db  {

    public $id;
    public $user;
    public $com;
    public $date;
 
    
    function __construct(){

        Db::__construct();
    }

    ////////////// Methode qui permet de inserer un commentaire 
    public function insertCom($user,$com){
     
        $sql = "INSERT INTO commentaires (`user`, `msg`) VALUES (:user , :com)";
        $insertCom= $this->db->prepare($sql);
        $insertCom->execute(array('user'=>$user, ':com'=>$com));
    }

        //////////methode permettant de recuperer tout les commentaires/////////////
    public function selectInfoCom(){
        $selectAllCom= $this->db->prepare("SELECT * FROM commentaires ORDER BY id_com DESC");
        $selectAllCom->execute();
        $commentaires= $selectAllCom -> fetchAll(PDO::FETCH_ASSOC);
        return $commentaires;
    }

}