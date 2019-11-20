<?php
//Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');

//Récupération des articles
$articles = getArticles();

?>

<!-- Contenu de la page -->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Actunews971</h1>
</div>

<div class="py-5 bg-light">
    <div class="container ">
        <div class="row">
            <?php foreach ($articles as $article) { ?>
                
            <div class="col-md-4 mt-4">
                <div class="card shadow-sm">
                    <img class="card-img-top" src="assets/img/article/<?=$article['image']?>" 
                     alt="<?=$article['titre']?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $article['titre'] ?></h5>
                        <div class="card-text">
                            <?= summarize($article['contenu']) ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                        
                        <a href="article.php?id_article=<?=$article['id']?>" class="btn btn-primary">Lire la suite</a>
                            <small class="text-muted"><?=$article['prenom']. ' '.$article['nom']?></small>
                        </div>
                        
                    </div>
                </div> <!-- Fin card -->
            </div>
        <?php } //fin de foreach?>
        </div> 
    </div> <!-- Fin container -->
</div>



<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>

