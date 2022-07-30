<?php $title = "Catégories" ?>
<?php session_start();?>
<?php require ("model/pizzas.php");?>
<?php $cat = new Pizza;?>
<?php $categories= $cat->selectPizzaByCat($_GET['id_cat']);?>
<?php ob_start(); ?>  


        <div class="categories_box">

          <?php foreach($categories as $values){ ?>
                    
            <a class='cat_link' href='pizza.php?id_pizza= <?= $values['id_pizza']?>'>
              <div class="categories_item" name="item">
                <div class="item__image">
                  <img src=<?= $values['photo'] ?>>
                </div>
                <div class="item__body">
                  <div class="categories_title">
                  <?= substr($values['nom'],0, 20).'...' ?>
                    <p class="categories_price">  <?= $values['prix']." €" ?></p>
                  </div>
                </div>
              </div>
            </a>
          <?php } ?> 

        </div>

        <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?>
 