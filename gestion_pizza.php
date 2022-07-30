<?php $title = "Gestion des pizzas" ?>
<?php session_start();?>
<?php require_once('controller/pizza_controller.php');?>

    <?php if(isset($_SESSION['user']['id_droit'])==77){
        $update = new PizzaController;
        $delete = new PizzaController;

        $pizza = new Pizza;
        $test = $pizza->selectPizza($_GET['id_pizza']);
    ?>

    <div class="background_admin">
        <div> 
    
            <h2 class="titre_admin">Gestion admin</h2>
            <form action=""  method="POST" class="form_creation"  enctype="multipart/form-data">
            
                <h3>Modifier une création :</h3>
                <label>Modifier nom pizza:</label>
                <input class="form_input" type="text" name="nom" value= "<?= $test['nom']?>">
                <label>Nouveau prix en €:</label>
                <input class="form_input" type="text" name="prix" value= "<?= $test['prix']?>">
                <label>Nouvelle description:</label>
                <textarea class="form_input" cols="30"  raws="2" style="height: 90px" name="description" value= <?=$test['description']?>> <?=$test['description']?>  </textarea>
                <label>Nouvelle photo:</label>
                <input class="form_input" type="file" placeholder= <?= $test['photo'] ?> name="photo" value= <?= $test['photo']?>  >
                <label for="new_pizza_select">Changer catégories: </label>
                        <select name="categorie" id="select_categorie" >
                        <option value=<?= $test['id_cat'] ?>>classiques</option>
                            <option value="1">classiques</option>
                            <option value="2">tomate</option>
                            <option value="3">creme</option>
                        </select>
                    <div style="display: flex;"> 
                    <input type="submit" value="supprimer" name="delete_pizza">
                    <input type="submit" value="valider modifications" name="update_pizza">
                    
                    </div>
                    <?= $update->pizzaUpdate(); 
                        $delete->deletePizza();
                    ?>

            </form>
            <a style="display: flex;justify-content: center;padding: 6px;background: black;width: 40px;margin: auto;border-radius: 5px;text-decoration: none;color:#F2D675;"href="admin.php">retour</a>
        </div>

    </div>
    <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?>
   
      <?php }else{ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <title>Document</title>
    </head>
    
   
    <body>
    <img style="display: flex;justify-content: center;margin: auto;width:50%;"src="img/trol.gif" >
    <a style= "padding: 5px 20px; color:#d9c069; background-color: #302f2b;border-radius: 5px; font-size: 18px; text-decoration: 0; border-radius 6px;  display: flex; justify-content: center; width:10%; margin: auto;"  href="index.php">Retour à l'accueil</a>
    </body> 
    </html>
    <?php  } ?>