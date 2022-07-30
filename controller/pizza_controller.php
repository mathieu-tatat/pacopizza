<?php 
require('model/pizzas.php');

    class PizzaController{

    

        public function getAllPizzas(){

            $modelPizzas= new Pizza;
            $getAllPizzas = $modelPizzas->selectInfoPizza();
        
        }

        public function insertPhoto(){
            $target_dir = "img/pizzas/";
            $target_file = $target_dir . basename($_FILES["photo"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["create_pizza"])) {
            $check = getimagesize($_FILES["photo"]["tmp_name"]);
            if($check !== false) {
                
                $uploadOk = 1;
            } else {
                echo "Le fichier n'est pas une image. ";
                $uploadOk = 0;
            }
            }

            //Check if file already exists
            //  if (file_exists($target_file)) {
            //    echo "Sorry, file already exists.";
            //    $uploadOk = 0;
            //  }

            // Check file size
            if ($_FILES["photo"]["size"] > 3000000) {
            echo "Désolé, taille du fichier tromp importante. Maximum 3 MO. ";
            $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Désolé,seuls le fichier JPG, JPEG, PNG & GIF sont autorisés. ";
            $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Désolé, fichier non téléchargé.";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                
               return $target_file;
            } else {
                echo "Désolé, erreur de chargement du fichier . ";
            }
            }
        }

        public function createPizza(){
            if(isset($_POST['create_pizza'])){

            if (empty($_POST['nom'])|| empty ($_POST['prix']) || empty ($_POST['photo']) || empty ($_POST['description']) || empty ($_POST['categorie'])) {
                echo"veuillez remplir tout les champs. ";
            }
            $modelPizza = new Pizza;
                $verif = $modelPizza->checkName(trim( htmlentities($_POST['nom'])));
                if($verif>0){
                    echo"nom de pizza deja existant. ";
                }

                else {
                    $pizza = new PizzaController;
                    $nom = htmlentities($_POST['nom']);
                    $prix = htmlentities($_POST['prix']);
                    $photo = $pizza->insertPhoto() ;
                    $description = htmlentities($_POST['description']);
                    $cat = htmlentities($_POST['categorie']);
                    $creation = new Pizza;
                    $creation->creation($nom,$prix,$photo,$description,$cat);
                    header('Location: admin.php');
                    echo"Nouvelle pizza enregistée";
                }
                
        }
    }

    public function updatePhoto(){
        $target_dir = "img/pizzas/";
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["update_pizza"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        }

        //Check if file already exists
        //  if (file_exists($target_file)) {
        //    echo "Sorry, file already exists.";
        //    $uploadOk = 0;
        //  }

        // Check file size
        if ($_FILES["photo"]["size"] > 3000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
           return $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
        }
    }

    public function pizzaUpdate(){

        if(isset($_POST['update_pizza'])){
            
          
            if (empty($_POST['nom'])|| empty ($_POST['prix']) || empty ($_FILES['photo']) || empty ($_POST['description']) || empty ($_POST['categorie'])) {
                echo"veuillez remplir tout les champs";
            }
            
                    $pizzaUpdate = new Pizza;
                    $newPhoto = new PizzaController;
                     
                    $id = $_GET['id_pizza'];
                    $nom = htmlspecialchars($_POST['nom']);
                    $prix = htmlspecialchars($_POST['prix']);
                    $photo= $newPhoto->updatePhoto();
                    $description = htmlspecialchars($_POST['description']);
                    $categorie = htmlspecialchars($_POST['categorie']);
                    $pizzaUpdate->updatePizza($nom,$prix,$photo,$description,$categorie,$id);
                    header('Location: admin.php');
                    echo"modification bien prise en compte ";

            }
        }   
        
        
        public function deletePizza(){
        
            if(isset($_POST['delete_pizza'])){

                $deletePizza = new Pizza;
                $id = $_GET['id_pizza'];
                $deletePizza->deletePizza($id);
                // redirection vers la page de connexion
                header('Location: admin.php');
                echo "le pizza a bien était supprimée";
                
            }
        }    
    }  



?>