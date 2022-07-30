<?php


require_once 'model.php';

class Pizza extends Db  {

    public $id;
    public $nom;    
    public $prix;   
    public $photo;
    public $description;
    public $cat;
   
    
    function __construct(){

        Db::__construct();
    }

////////// recupere toutes les infos de toutes les pizzas////////
    public function selectInfoPizza(){
        $selectAllPizza= $this->db->prepare("SELECT * FROM pizzas  ORDER BY id_pizza DESC");
        $selectAllPizza->execute();
        $pizzas= $selectAllPizza -> fetchAll(PDO::FETCH_ASSOC);
        return $pizzas;
    }

    ///////////// selectionne les 12 dernieres pizzas ///////////
    public function selectInfoPizzaLimit(){
        $selectAllPizza= $this->db->prepare("SELECT * FROM pizzas  ORDER BY id_pizza DESC LIMIT 13");
        $selectAllPizza->execute();
        $pizzas= $selectAllPizza -> fetchAll(PDO::FETCH_ASSOC);
        return $pizzas;
    }

    ////////: selectionne les pizzas par leur nom ///////////
    public function checkName($nom){
        $checkNom=  $this->db->prepare("SELECT nom FROM pizzas WHERE nom = :nom");
        $checkNom->execute(array(':nom'=>$nom));
        $verif=$checkNom-> rowCount();
        return $verif;
    }

    /////////////// selectionne les pizzas par leur ID ///////////////
    public function selectPizza($id){
        $checkId=  $this->db->prepare("SELECT * FROM pizzas WHERE id_pizza = :id_pizza");
        $checkId->execute(array(':id_pizza'=>$_GET['id_pizza']));
        $pizza = $checkId->fetch(PDO::FETCH_ASSOC);
        return $pizza;
    }

/////////// selectionne les pizza par leur id de categorie /////////
    public function selectPizzaByCat($categories){
        $checkIdCat=  $this->db->prepare("SELECT * FROM pizzas WHERE id_cat = :id_cat");
        $checkIdCat->execute(array(':id_cat'=>$categories));
        $pizzaCat = $checkIdCat->fetchAll(PDO::FETCH_ASSOC);
        return $pizzaCat;
    }

    ////////////// recupère toute les catégories /////////////
    public function selectCategorieName(){
        $checkCatName=  $this->db->prepare("SELECT * FROM categories");
        $checkCatName->execute();
        $categorieName = $checkCatName->fetchALL(PDO::FETCH_ASSOC);
        return $categorieName;
    }

    /////////////// permet de d'ajouter une nouvelle pizza //////////
    public function creation($nom,$prix,$photo,$description,$cat){
        $createPizza= $this->db->prepare("INSERT INTO pizzas (nom, prix, photo, description, id_cat) VALUES (:nom , :prix,  :photo, :description, :id_cat)");
        $createPizza->execute(array(':nom'=>$nom, ':prix'=>$prix,  ':photo'=>$photo, ':description'=>$description,':id_cat'=>$cat ));
    }

    ///////////// supprime une pizza ////////////////
    public function deletePizza($id){
    $deletePizzaById = $this->db->prepare("DELETE FROM pizzas WHERE id_pizza = :id ");
    $deletePizzaById->execute(array(':id'=>$id));

    }

    ///////////// Met a jour les infos d'une pizza ///////////
    public function updatePizza(    $nom,$prix,$photo,$description,$categorie,$id){

        $sql = "UPDATE pizzas 
                SET nom = ?, 
                    prix = ?, 
                    photo = ?, 
                    pizzas.description = ?, 
                    id_cat = ? 
                WHERE id_pizza = ?";
        $modifyPizza = $this->db->prepare($sql);
        $modifyPizza->execute(array(
                    $nom,
                    $prix,
                    $photo,
                    $description, 
                    $categorie,
                    $id));
       
    }
}