<?php 
    
    //Inclusion du header sur la page
    require_once(__DIR__ . '/partials/header.php');

    // SI mon paramère n'existe pas valeur O
    //$id_article = (isset($_GET['id_article'])) ? $_GET['id_article'] : 0 ;
    // $article = getArticleById( $id_article) ;
    //$nom_auteur = (isset($_GET['nom_auteur'])) ? $_GET['nom_auteur'] : '';
    // Récupération de l'ID de l'auteur dans l'URL
    $auteur =  isOnline(); 
    $auteurID = (isset($_GET['id_auteur'])) ? $_GET['id_auteur'] : 0;
    //$id_auteur   = $auteur['id '];
   //var_dump($auteurID);
   
    // Je récupère les articles de la catégorie
    $articles = getArticlesByAuteurId($auteurID);
    //var_dump($articles);
    //$articles= getArticlesByAuteurId($_GET['id_auteur'] ?? 0) ;
  
    if (isset($_GET['supp'])){
        $idArticle= $_GET['supp'];
        var_dump($auteurID);
        $delete=$db->prepare('DELETE from article WHERE id = :id');
        $delete->bindValue(':id',$idArticle, PDO::PARAM_INT);
     
            if ($delete->execute()){
                redirection(' ./mes-articles.php?id_auteur= '.$auteurID);
            }else{
                redirection(' ./erreur404.php');
            }
    
    }

  
?>



<!-- Contenu de la page -->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Mes articles</h1>
    <h6 class="display-4"><?= $auteur['prenom'].' '.$auteur['nom'] ?></h6>
</div>

<!-- Affichage des articles de l'auteur-->
<div class="py-5 bg-light">
    <div class="container ">
        <div class="row">
            <table class="table table-dark mt-4">
            <thead>
                    <tr class="text-center">
                    <th scope="col">Titre</th>
                    <th scope="col">Image</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Contenu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         if (empty($articles)){?>
                            <tr>
                                <td colspan="10" class="mx-auto">
                                    <div class="alert alert-warning">
                                        Pas d'article pour le moment....
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        <?php foreach ($articles as $article) { ?>
                        <!-- creation condition-->
                        <tr>
                            <td><?=$article['titre']?></td>
                            <td><?=$article['image']?></td>
                            <td><?=$article['date_creation']?></td>
                            <td><?=$article['categorie_id']?></td>
                            <td><?=summarize($article['contenu'])?></td>
                            <td><a name="modif" class="btn btn-warning" href="./action/modify.php?id= <?= $article['id']?>">Modifier</a></td>
                            <td><a name="supp" class="btn btn-danger" href="mes-articles.php?supp= <?= $article['id']?>">Supprimer</a></td>
                        </tr>   
                    <?php }  //fin du foreach ?>
                </tbody>
              

            </table>
        </div> 
    </div> <!-- Fin container -->
</div>


<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>
