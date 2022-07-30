<?php $title = "Contact" ?>
<?php session_start();?>
<?php require_once('controller/pizza_controller.php');?>
<?php ob_start(); ?>
<?php 
   
    
    $test = new PizzaController;
    $pizza = new Pizza;
    $link= $pizza->selectInfoPizza();?>
    


    <div class="background_admin">
        <div> 
    
        <h2 class="titre_admin">Contact</h2>
            <form method="POST" class="form_contact" enctype="multipart/form-data">
                <p class="text-contact">Depuis plus de 10 ans nous mettons en oeuvre tout notre
                    savoir faire pour réaliser des pizzas dans la plus pur traditions italienne. Nous choisissons avec soin des produits frais et de qualités afin de ravir vos papilles. </br></br>

                    En constante recherche de nouveautés  nous mettons à jour regulierement notre carte afin de pouvoir satisfaire le plus grand nombre d’entre vous et également rester dans la tendance actuelle des saveur qu’il est possible de vous apporter. N’hesitez pas a nous contacter afin de nous faire parvenir vos demandes. et laissez un avis de votre experience chez nous. </br></br>
                    <a class="contact-link" href="mailto:pacopizza@outlook.com">Contactez-nous <img class="icone-contact"src="assets/contact.svg" alt=""> </a>
                </p>

                <img src="assets/logo-paco.jpg" alt=""class="image-contact">
                
                
            </form>

       <div class="map-responsive">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d806.2051900124072!2d5.5702885781510005!3d43.29617091369736!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12c9a330c646511f%3A0x694a460538b900c9!2sAv.%20Marcel%20Pagnol%2C%2013400%20Aubagne!5e0!3m2!1sfr!2sfr!4v1657876774646!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        
    </div>

    </div>

    
    
      
   <?php $content = ob_get_clean(); ?>

<?php require ('patron.php'); ?> 


   
