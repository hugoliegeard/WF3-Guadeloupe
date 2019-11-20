<?php
     // Récupérations de nos fonctions globales
    require_once(__DIR__ . '/../functions/global.php');

    //Connexion à la BDD
    require_once(__DIR__ . '/../config/database.php');
   
    
    // Récupérations de nos fonctions
    require_once(__DIR__ . '/../functions/categorie.php');
    require_once(__DIR__ . '/../functions/article.php');
    require_once(__DIR__ . '/../functions/auteur.php');
 
    
    //---Récupération categorie provenant de la bdd ----//
     //$categories = ['Politique', 'Economie', 'Culture','Sports'];

     
    $categories  =  getCategories();
    // SI un auteur est en session alors $auteur prendra comme vameur le tableau d'auteur sinon false
    // sinon faire un if online() avant les balsie de connexion et inscription
    $auteurIsLogged = isOnline();
    $auteur= $auteurIsLogged;
   //var_dump($auteur['id']);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS PERSO -->
    <link rel="stylesheet" href="assets/css/style.css">
     <!-- CDN CKEDITOR -->
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <title>Guadeloupe Actualités</title>
    
</head>
<body>

<!-- Menu du site -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Actunews971</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <?php foreach ($categories as $categorie) {?>
                    <li class="nav-item">
                    <a class="nav-link" href="categorie.php?nom_categorie=<?= $categorie['nom'] ?>&id_categorie=<?= $categorie['id'] ?>">
                        <?= $categorie['nom'] ?></a>
                </li>
                <?php } ?>
            </ul>
            <div class="text-right">

                
                <?php if ($auteurIsLogged){ ?>
                    <span class="navbar-text mx-2">Bonjour <strong><?= $auteurIsLogged['prenom']?>,</strong></span>
                    <a class="nav-item btn btn-outline-warning mx-2" href="creer-un-article.php">Créer un article</a>
                    <a class="nav-item btn btn-outline-info mx-2" href="mes-articles.php?id_auteur=<?= $auteur['id'] ?>">Mes Articles</a>
                    <a class="nav-item btn btn-outline-primary mx-2" href="deconnexion.php">Déconnexion</a>
                <?php } else { ?>
                <a class="nav-item btn btn-outline-info mx-2" href="connexion.php">Connexion</a>
                <a class="nav-item btn btn-outline-warning mx-2" href="inscription.php">Inscription</a>
                <?php } ?>
            </div>
        </div>
    </nav>
    <!-- Menu du site -->