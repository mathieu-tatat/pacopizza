<?php


require_once 'model.php';

class Notes extends Db  {

    public $id;
    public $note;
    public $idPizza;
  
    
    function __construct(){

        Db::__construct();
    }

   ///////////////////// Methode pour ajouter une nouvelle note /////////////
    public function insertNote($note,$idPizza){
        $sql = "INSERT INTO notes (`note`,`id_pizza`) VALUES (? , ?)";
        $insertNote= $this->db->prepare($sql);
        $insertNote->execute(array($note, $idPizza));
    }

    ////////////////// Methode pour faire une moyenne des notes en fonction de l'id d'une pizza//////////
    public function selectAllNotes($pizzaId){
        $selectAllavis= $this->db->prepare("SELECT AVG(note) AS moyenne FROM notes WHERE id_pizza = ? ");
        $selectAllavis->execute(array($pizzaId));
        $allAvis= $selectAllavis -> fetchAll(PDO::FETCH_ASSOC);
        return $allAvis;
    }
/////////////////methode de moyenne de toutes les notes ////////////////
    public function selectNotes(){
        $selectAllnote= $this->db->prepare("SELECT AVG(note) AS moyenne FROM notes");
        $selectAllnote->execute();
        $allnote= $selectAllnote -> fetchAll(PDO::FETCH_ASSOC);
        return $allnote;
    }
}