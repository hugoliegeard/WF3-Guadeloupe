<?php 
    
    //Inclusion du header sur la page
    require_once(__DIR__ . '/partials/header.php');

    // SI mon paramère n'existe pas valeur O
    //$id_article = (isset($_GET['id_article'])) ? $_GET['id_article'] : 0 ;
    // $article = getArticleById( $id_article) ;

    $auteur= getArticleById($_GET['id_article'] ?? 0) ;
    //var_dump($article);

?>



<!-- Contenu de la page -->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4"><?= $auteur['nom'] ?></h1>
</div>

<!-- Affichage des articles de l'auteur-->


<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>
