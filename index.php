
<?php $title = "Accueil" ?>

  <?php session_start(); ?> 
  <?php require ("model/model.php");?>
  <?php require('model/pizzas.php');?>
  <?php require('controller/com_controller.php'); ?>
  <?php require('model/notes.php');?>
  <?php $pizza = new Pizza;?>
  <?php $test= $pizza->selectInfoPizzaLimit();?>
  <?php $avg= new Notes;?>
  <?php $noteAvg = $avg-> selectNotes();?>
  <?php $comments = new ComController;?>
  <?php $commentaires = new Commentaire;?>
  <?php $com = $commentaires->selectInfoCom();?>
    
  <?php ob_start(); ?>  



  <div class="container">
   
        <h2 class="sous_titre">Produits mis en avant :</h2>
        <div id="carousel1" style="margin-top: -87px;overflow-x: hidden;padding: 25px;   overflow-y: hidden;" >
         
        <?php foreach($test as $value){ ?>
        
            <a style='text-decoration: none;' href='pizza.php?id_pizza= <?= $value["id_pizza"]?>'>
                <div class='item'>
                    <div class='item__image'>  
                        <img src="<?= $value['photo'] ?>" > 
                    </div>
                    <div class='item__body'>
                    <div class='item__title'>
                        <?= substr($value['nom'],0, 20).'...' ?>
                    </div>
                    </div>
                </div>
            </a>

            <?php } ?> 
            </div>
            
        </div>

    </div>

    
    <div style="display: flex;align-items: center;">
    <h3 class="note_generale">Etablissement noté:<?=  " ".substr($noteAvg[0]['moyenne'],0,3)." " ?><img src="assets/Star1.png"> /5 </h3>
        <img class="labelLogo"src="assets/SFlabel.png" alt="">
    </div>

    
        <h3 class="positionAvis">Avis clients :</h3>
        <div class="box_avis">
            <?php foreach($com as $comment){ ?>
                <div class="box_avis_msg">
                    <p class="nom_date"><?= $comment['user']?> le <?= $comment['date']?> </p>
                    <p class="msg_avis"><?= $comment['msg']?> </p>
                </div>
            <?php } ?>
           
        </div>
        
        <div class="com_avis_generale">
            <form action=""  method="POST" class="form_generale">
                <label>Donner votre avis sur notre etablissement:</label>
                <textarea class="textearea_generale" name="com_general" cols="30" rows="2" placeholder="Déposer votre avis ici ..."></textarea>
               <?php if(isset($_SESSION['user'])){ ?>
                    <input type='submit' value='Déposer' name='button_com'>
               <?php }else{ ?>
                   <p class="alertMsg">Vous devez etre connecté pour laisser un commentaire</p>
               <?php } ?>
               
                <?= $comments->commenter();?>
            </form>


            <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?>