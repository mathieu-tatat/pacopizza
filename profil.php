<?php $title = "Profil" ?>
<?php session_start();?>
<?php require('model/pizzas.php');?>
<?php require_once('controller/user_controller.php');?>
<?php $delete = new UserController;?>
<?php $updateUser = new UserController;?>



    <?php ob_start(); ?>
        
        <div class="background_admin">
            <form method="POST" class="form_inscription">
                <h2 class="titre_form">Dashboard</h2>
                <?php 
       
                if($_SESSION['user']['id_droit']==77){  ?>
                <a href='admin.php'><img class='logoAdmin'src='assets/pizzaAdmin.svg' alt='accés gestion'></a> 
                <?php
                }else; ?>
                
               
                <label>Nom:</label>
                <input class="form_input" type="text" name="nom" id="nomP" value= <?= $_SESSION['user']['nom']?> >
               
                <label>Prénom:</label>
                <input class="form_input" type="text" name="prenom" id="prenomP" value=<?= $_SESSION['user']['prenom']?>>
               
                <label>Adresse Mail:</label>
                <input class="form_input" type="email" name="email" id="emailP"value=<?= $_SESSION['user']['email']?>>
                
                <label>Mot de passe actuel:</label>
                <input class="form_input" type="password" name="mdp1" id="passwordP"placeholder= ******* >
               
                <label>Nouveau mot de passe:</label>
                <input class="form_input" type="password" name="newmdp" id="passwordConfP"placeholder="Entrer votre nouveaux mot de passe ..." required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" >
              
                <label>Confirmation du mot de passe:</label>
                <input class="form_input" type="password" name="newmdp2" id="passwordConfP2" placeholder="Confirmer votre nouveaux mot de passe...">
                 
                    <div style="display: flex;">
                    <?php if($_SESSION['user']['id_droit']==1){  ?>
                        <input type="submit" value="delete profile" name="button_delete_profil">
                            <?php if(isset($_POST['button_profil'])){ ?>
                                <input type='submit' value='effacer' name='button_delete_profil'>
                            <?php } ?>
                    <?php }?>
                        <input type="submit" value="update profile" name="button_update_profil">

                    </div>
                    <?= $delete->delete()?>
                    <?= $updateUser->updateUser()?>

            </form>

        </div>
      
    <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?>