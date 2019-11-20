<?php

/*
 *  Ici, nous aurons les fonctions utiles à notre projet
 *  Utilisable sur toutes les pages.
 */

 session_start(); //Démarrage de la session PHP

// Permet de rediriger un utilisateur sur une nouvelle page
function redirection($page){
    header('Location: '.$page);
}

//Permet de vérifier si auteur est connecté en session
function isOnline(){
    return isset($_SESSION['auteur']) ? $_SESSION['auteur'] : false; 
}


//-- Permet de générer une accroche / un résumé
 function summarize($text){
    //suppression des balises HTML
    $string = strip_tags($text);
    
    // Si mon string est > à 150
    if (strlen($string > 70 )){
        // Je coupe ma chaine à 70
        $stringCut = substr($string, 0 ,70);
        //Je m'assure de couper un mot en recherchant derniere position
        $string = substr($stringCut, 0 , strrpos($stringCut, ' '));
        
    }
    return $string . '...';

 }


 // Permet de générer un slug à partir d'un string

function slugify($text)
{
  // replace non letter or digits by -
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  // trim
  $text = trim($text, '-');

  // remove duplicate -
  $text = preg_replace('~-+~', '-', $text);

  // lowercase
  $text = strtolower($text);

  if (empty($text)) {
    return 'n-a';
  }

  return $text;
}