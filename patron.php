<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/SFPaco.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/carousel.css" />
    <script src="js/main.js" async></script>
    <script src="js/inscription.js" ></script>
    <script src="js/script.js" ></script>
    <!-- <script src="js/messages.js" ></script> -->
    <title><?= $title ?></title>
</head>
<body>

    <header >
        <?php require_once ('header.php') ?>
    </header>
    
    <main>
        <?= $content ?>
    </main>

    <footer>
        <?php require_once ('footer.php') ?>   
    </footer>

</html>

