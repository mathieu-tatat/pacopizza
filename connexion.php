<?php $title = "Connexion" ?>
<?php session_start();?>
<?php require('model/pizzas.php');?>
<?php require_once('controller/user_controller.php');?>
<?php $test = new UserController;?>
<?php ob_start(); ?>  

    <div class="background_admin">
 
        <form method="POST" class="form_connexion">
            <h2 class="titre_form">CONNEXION</h2>
            <label>Adresse Mail:</label>
            <input class="form_input" type="email" name="email" placeholder="Entrer votre email...">
            <label>Mots de passe:</label>
            <input class="form_input" type="password" name="mdp" placeholder="Entrer votre mot de passe...">
            <button type="submit" name="button_con">connexion</button>
            <p class="redir">Vous n'avez pas de compte ? </br><a href="inscription.php">Créer un compte</a></p> 
            <?= $test->verification() ?>
        </form>

    </div> 

    <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?>
    