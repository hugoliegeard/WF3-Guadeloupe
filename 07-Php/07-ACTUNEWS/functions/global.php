<?php

/*
 *  Ici, nous aurons les fonctions utiles à notre projet
 *  Utilisable sur toutes les pages.
 */

 // Démarrage de la session PHP
 session_start();

/**
 * Permet de rediriger un utilisateur
 * sur une nouvelle page.
 */
function redirection($page) {
    header('Location: ' . $page);
}

/**
 * Permet de vérifier si un auteur
 * est connecté en session.
 * Retourne oui si un utilisateur est connecté
 * non si ce n'est pas le cas
 */
function isOnline() {
    return isset( $_SESSION['auteur'] ) ? $_SESSION['auteur'] : false ;
}

//-- Permet de générer une accroche / un résumé
 function summarize($text){
    //suppression des balises HTML
    $string = strip_tags($text);
    
    // Si mon string est > à 150
    if (strlen($string > 70 )){
        // Je coupe ma chaine à 70
        $stringCut = substr($string, 0 , 70);
        //Je m'assure de couper un mot en recherchant derniere position
        $string = substr($stringCut, 0 , strrpos($stringCut, ' '));
        
    }
    return $string . '...';

 }