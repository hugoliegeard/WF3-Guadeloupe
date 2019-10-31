<?php
/**
 * Retourne les catégories du site
 * depuis la base de données.
 */
function getCategories() {
    global $db; // Récupération du $db depuis l'espace global.
    $query = $db->query('SELECT * FROM categorie');
    return $query->fetchAll(); // On retourne les catégories de la BDD.
}