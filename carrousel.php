<?php

$pizza = new Pizza;
$test= $pizza->selectInfoPizzaLimit();

?>
  <div class="container">
   
    <h2 class="sous_titre">Nos meilleurs ventes :</h2>
    <div id="carousel1" style="margin-top: -65px;">
      
    
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