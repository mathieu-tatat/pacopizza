<?php $title = "Inscription" ?>
<?php session_start();?>
<?php require('model/pizzas.php');?>
<?php require_once('controller/user_controller.php');?>
<?php $test = new UserController;?>

    <?php ob_start(); ?>
    
        <div class="background_admin">
            
            <form method="POST" class="form_inscription" id="formsub">

                <h2 class="titre_form">Inscription</h2>
                <small></small>
                <label>Nom:</label>
                <input class="form_input" autocomplete="off" type="text" name="nom" id="nom"placeholder="Entrer votre nom...">
                
                <label>Prénom:</label>
                <input class="form_input" autocomplete="off"  type="text" name="prenom" id="prenom" placeholder="Entrer votre prénom...">
                <small></small>
                <label>Adresse Mail:</label>
                <input class="form_input" autocomplete="off"  type="email" name="email" id="email"placeholder="Entrer votre email...">
                <small></small>
                <label>Mot de passe:</label>
                <input class="form_input" autocomplete="off"  type="password" name="password" id="password"  placeholder="Entrer votre mot de passe..." required pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$" />
                <small></small>
                <label>Confirmation du mot de passe:</label>
                <input class="form_input" autocomplete="off"  type="password" name="passwordConf" id="passwordConf" placeholder="Confirmer votre mot de passe...">
                <small></small>
                <button type="submit"   value="inscription" name="button_inscri" id="submitSub">Inscription
                </button>
                <p class="redir">Vous avez déjà un compte ? </br><a href="connexion.php">Se connecter</a></p> 

                <?= $test->createUser()?>

            </form>
        </div>
        
    <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?>
      
