<?php

// Creation fonction getArticles() : retourner tous les articles

function  getArticles()  {
    global $db;
    $query = $db->query('SELECT *, article.id AS "id"  FROM article, auteur
     WHERE article.auteur_id = auteur.id  ORDER BY article.id DESC');
    return $query->fetchAll();
    
}

// Creation fonction getArticleById() : Récupérer article grace ID

function  getArticleById($article_id) {
    global $db;
    //$query = $db->prepare('SELECT * FROM article where id = :id');
    $sql= 'SELECT * FROM article where id = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $article_id);
    $query->execute();
    return $query->fetch();
    
}

// Creation fonction getArticlesByCategorieId() : récupérer article d'une catégorie grace àson id

function  getArticlesByCategorieId($categorie_id) {
    global $db;
    $sql= 'SELECT *, article.id AS "id"  FROM article, auteur WHERE 
    article.auteur_id = auteur.id AND article.categorie_id = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $categorie_id);
    $query->execute();
    return $query->fetchAll();
    
}


function  getArticlesByAuteurId($auteur_id) {
    global $db;
    $sql= 'SELECT *, auteur.id AS "id"  FROM article, auteur WHERE 
     article.auteur_id = auteur.id AND auteur.id = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $auteur_id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetchAll();
   
}

function addArticle( $auteur_id, $categorie_id, $titre, $contenu, $image ){
    global $db;
    $query = $db->prepare('INSERT INTO article (titre, contenu, image, categorie_id, auteur_id) VALUES (:titre, :contenu, :image, :categorie_id, :auteur_id)');
    $query->bindValue(':titre', $titre, PDO::PARAM_STR);
    $query->bindValue(':contenu', $contenu, PDO::PARAM_STR);
    $query->bindValue(':image', $image, PDO::PARAM_STR);
    $query->bindValue(':categorie_id', $categorie_id, PDO::PARAM_INT);
    $query->bindValue(':auteur_id', $auteur_id, PDO::PARAM_INT); 

    // Si article a bien été inséré alors je retourne l'id de l'article sinon faux
    return $query->execute() ? $db->lastInsertId() : false;
    

}


function deleteArticle($article_id){
        global $db;
        $delete=$db->prepare('DELETE from article WHERE id = :id');
        $delete->bindValue(':id',$article_id, PDO::PARAM_INT);
            if ($delete->execute()){
                header('location: ./mes-articles.php?id.php');
            }
    

}