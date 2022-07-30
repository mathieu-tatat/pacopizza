<?php session_start();?>

<?php require('model/pizzas.php');?>
<?php require('controller/notes_controller.php');?>
<?php require('controller/avis_controller.php');?>

<?php $note = new NotesController;?>
<?php $selectNote =  new Notes;?>
<?php $avgNote = $selectNote->selectAllNotes($_GET['id_pizza']);?>

<?php $pizza = new Pizza;?>
<?php $test = $pizza->selectPizza($_GET['id_pizza']);?>
<?php $title = "Pizza ".$test['nom']?>
<?php $avis = new AvisController;?>
<?php $addAvis = new Avis;?>
<?php $allAvis = $addAvis->selectInfoAvis($_GET['id_pizza']);?>

<?php ob_start(); ?>

         <h2 class="pizza_title"><?= $test['nom'] ?></h2>
    <div class="pizza_container">
       <div class="box_pizz">
        <img class="img_pizza" src="<?= $test['photo']?>" alt="">
        </div>
        <div class="infos_pizza">
        <p class="price"> <?= $test['prix']?> €</p>
        <h3 class="note_pizza"> Pizza notée: <?=  substr($avgNote[0]['moyenne'],0,3) ?> <img src="assets/Star1.png"> /5 </h3>
        <p>Description:</p>
        <p class="desc_pizza"><?= $test['description'] ?></p>
        </div>
    </div>
    <h3 style="margin-left: 5%;">Ce qu'en pensent nos clients:</h3>
        <div class="box_com_pizza">
            <?php foreach($allAvis as $avisRow){ ?>
                <div class="box_com_msg">
                    <p class="nom_date"><?= $avisRow['user_name']?> le <?= $avisRow['date']?> </p>
                    <p class="msg_avis"><?= $avisRow['msg']?></p>
                </div>
            <?php } ?>

        </div>

        <div class="com_avis_pizza">
                <form action=""  method="POST" class="form_pizza">
                    <label>Donner votre avis:</label>
                    <textarea class="textearea_pizza" name="avis_box" cols="30" rows="2" placeholder="donner votre avis ici ..."></textarea>
                    <?php if(isset($_SESSION['user'])){  ?>
                        <input type='submit' value='Déposer' name='button_avis'>
                        <?php }else{ ?>
                        <p class="alertMsg">Vous devez etre connecté pour noter ou laisser un commentaire </p> 
                    <?php } ?>
                    
                <?php $avis->avis();?>
                </form>

                <form class="option_note_pizza" method="POST">
                    <label >Noter: </label>
                    <select name="note_pizza" id="note_pizza_select" >
                        <option value= '5'>5</option>
                        <option value= '4'>4</option>
                        <option value= '3'>3</option>
                        <option value= '2'>2</option>
                        <option value= '1'>1</option>
                    </select>
                    <img src="assets/Star1.png" alt="">
                    <?php if(isset($_SESSION['user'])) : ?>
                    <input type='submit' value='Noter' class='button_note_pizza' name='button_note'>
                    <?php endif; ?>
                    <?php $note->notes();?>
                </form>
                
        </div>

    <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?>