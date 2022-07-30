<?php $title = "Admin Profil" ?>
<?php session_start();?>
<?php require_once('controller/pizza_controller.php');?>
<?php ob_start(); ?>
<?php 
    if(isset($_SESSION['user']['id_droit'])==77){ 
    
    $test = new PizzaController;
    $pizza = new Pizza;
    $link= $pizza->selectInfoPizza();?>
    


    <div class="background_admin">
<div> 
    
<h2 class="titre_admin">Gestion admin</h2>
    <form method="POST" class="form_creation" enctype="multipart/form-data">
           
            <h3>Nouvelle création :</h3>
            <label>Nom pizza:</label>
            <input class="form_input" type="text" name="nom" placeholder="...">
            <label>Prix en €:</label>
            <input class="form_input" type="text" name="prix" placeholder="€...">
            <label>Description:</label>
            <textarea class="form_input" cols="30"  raws="2" name="description" placeholder="ingrédients"></textarea>
            <label>Photo:</label>
            <input class="form_input" type="file" name="photo">
            <label for="cat_select">Catégories: </label>
                    <select name="categorie" id="select_categorie" >
                        <option value="1">classiques</option>
                        <option value="2">tomate</option>
                        <option value="3">creme</option>
                    </select>
                <div style="display: flex;">
                <input type="submit" value="valider création" name="create_pizza">
                </div>
                <?= $test->createPizza(); ?>
        </form>

        <div class="space_nom_pizzas">
            <h3>Gestion des créations :</h3>
            <div class="liste_pizzas">
                <?php foreach($link as $name){;?>
                    <a href="gestion_pizza.php?id_pizza=<?= $name['id_pizza']?>" class='space_pizza'> <?= substr($name['nom'],0, 25).'...' ?> <img class="photo_liste_admin"src="<?= $name['photo']?>"></a>
              <?php  } ?>
            </div>
        </div>
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



