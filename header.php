<?php $pizzaCategorie = new Pizza ;?>
<?php $categorie = $pizzaCategorie->selectCategorieName();?>


    <div class="overlay-menu-mobile" onclick="closeMenuMobile()"></div>  
            <header class="header">

        <div style="display: flex; justify-content: space-between;padding-right: 3%;align-items: center;">
                    <div class="header__logo">
                        <a href="index.php"><img class='logoPaco'src="assets/pacoLogo.png"/></a>
                    </div>
            

                        <h3 class="neon_bleu">Ouvert du:<br> mercredi au lundi <br>de 18H00 a 21h30 <br>fermé le mardi</h3>


    <div class="pacoTitle">
            <h1 class="titleh1">Pacco <br>Pizza</h1>
    </div>
                        <img class="neonPizza"src="assets/neonPizza.png" alt="">

                        <h3 class="supp">Ingrédient</br> supplementaire</br>1€</h3> 

                    <div class= "lettre_bleu"> Boulevard <br>Marcel Pagnol<br>13400 Aubagne<br><a href="tel:0629566723" style="color: #45B5F3;"> 06 29 14 36 45</a></div>
        </div>
                  <div>
                    <nav class="header__nav">
                        <div class="header__nav__close" onclick="closeMenuMobile()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    
                        <ul class="header__nav__menu">

                            <form action="#" method="post" class='header__nav__menu__link'id="formSearch">
                                <input id="search" type="text" placeholder="Recherche..."  autocomplete="off">
                                 
                             <ul id = "searchList"class="autocom-box"></ul>
                                </form>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
                           
                        <?php foreach($categorie as $value){ ?>
                            <li class="header__nav__menu__link">
                                <a href="categories.php?id_cat= <?= $value['id_cat']?>"> <?= $value['nom_cat'] ?></a>
                            </li>
                            <?php } ?>
                          
                          <?php if(isset($_SESSION['user'])){
                                echo"<li class='header__nav__menu__link'>
                                <a href='model/deco.php'>Deconnexion</a>
                                </li>";}else{ echo "<li class='header__nav__menu__link'>
                                    <a href='connexion.php'>Connexion &nbsp &nbsp &nbsp</a>
                                    </li>";};?>

                            <li class="header__nav__logo__link">
                                <?php 
                                    if(isset($_SESSION['user']['id_droit'])==1){
                                    echo "<a href='profil.php'><img class='logoProfil'src='assets/Group.png'></img></a>" ;
                                    }else{ echo "<a href='connexion.php'><img class='logoProfil'src='assets/Group.png'</img></a>"; } ?>
                            </li>
                            
                        </ul>
                    </nav>
                  </div>

                    <div class="header__burger" onclick="openMenuMobile()">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </div>
            </header>

    <script>
        function openMenuMobile() {
            document.querySelector('.header__nav').classList.add('open');
            document.querySelector('.overlay-menu-mobile').classList.add('open');
        }

        function closeMenuMobile() {
            document.querySelector('.header__nav').classList.remove('open');
            document.querySelector('.overlay-menu-mobile').classList.remove('open');
        }
    </script>
