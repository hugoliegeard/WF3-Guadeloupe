<!-- Inclusion du header -->
<?php include_once './include/header.php'; ?>
    
<?php
    // Aperçu des données $_GET
    print_r($_GET);
    
    // Si $_GET['page'] n'est pas vide.
    if ( !empty( $_GET['page'] ) ) {
        // Je créer une variable $page
        $page = $_GET['page'];
    } else {
        $page = 'accueil';
    }

?>
<!-- Afficher les données de $page -->
<h3>Je suis la page <?= $page ?></h3>

<!-- 
    On inclus $page dans notre fichier. 
    include './pages/accueil.php';
    include './pages/presentation.php';
    -----------------------------------
    Si $page ou $_GET['page'] égale à accueil
    alors j'inclus accueil.php dans ma page.
    Pareil pour les autres pages.
    -----------------------------------
-->
<?php include 'pages/' . $page . '.php'; ?>

<!-- Inclusion du footer -->
<?php include_once './include/footer.php'; ?>
