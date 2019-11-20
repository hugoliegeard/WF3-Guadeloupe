<?php 
    
    //Inclusion du header sur la page
    require_once(__DIR__ . '/partials/header.php');

    // SI mon paramère n'existe pas valeur O
    //$id_article = (isset($_GET['id_article'])) ? $_GET['id_article'] : 0 ;
    // $article = getArticleById( $id_article) ;

    $article = getArticleById($_GET['id_article'] ?? 0) ;
    //var_dump($article);

?>

<!-- Contenu de la page -->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?= $article['titre'] ?></h1>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row ">
            <div class="col-md-12  ">
                <img class="img-fluid" src="assets/img/article/<?=$article['image']?>" alt="<?=$article['titre']?>">
            </div> <!-- Fin col-md-12 -->
            <div class="col-md-12 mt-4">
                <?=$article['contenu']?>
            </div> <!-- Fin col-md-12 -->
        </div>
    </div>
</div>


<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>
