<?php

// Creation fonction getArticles() : retourner tous les articles

function  getArticles()  {
    global $db;
    $query = $db->query('SELECT *  FROM article, auteur
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
    $sql= 'SELECT * FROM article, auteur WHERE 
    article.auteur_id = auteur.id AND article.categorie_id = :id';
    $query = $db->prepare($sql);
    $query->bindValue(':id', $categorie_id);
    $query->execute();
    return $query->fetchAll();
    
}

