<?php


require_once 'model.php';

////////////// La class avis sert a commenter une pizza ///////////
class Avis extends Db  {

    public $id;
    public $name;
    public $msg;
    public $date;
    public $pizzaId;
    
    function __construct(){

        Db::__construct();
    }
   //////////////: methode d'ajout d'un avis /////////
    public function insertAvis($user,$avis,$pizzaId){
     
        $sql = "INSERT INTO avis (`user_name`, `msg`,`id_pizza`) VALUES (:user , :avis, :id_pizza)";
        $insertAvis= $this->db->prepare($sql);
        $insertAvis->execute(array(':user'=>$user, ':avis'=>$avis,':id_pizza'=>$pizzaId));
    }

    ///////////// methode qui recupere toutes les informations d'une pizza grace a son ID//////////
    public function selectInfoAvis($pizzaId){
        $selectAllavis= $this->db->prepare("SELECT * FROM avis WHERE id_pizza = :id_pizza ");
        $selectAllavis->execute(array(':id_pizza'=> $pizzaId));
        $allAvis= $selectAllavis -> fetchAll(PDO::FETCH_ASSOC);
        return $allAvis;
    }

}