<?php

session_start(); // Permet de démarrer une session PHP.

echo '<pre>';
var_dump($_SESSION);
echo '<pre>';

/*
    $_SESSION est une superglobale comme $_POST ou $_GET.
    je vais donc travailler avec un tableau (array).
*/

$_SESSION['prenom'] = "Hugo";
$_SESSION['nom'] = "LIEGEARD";
$_SESSION['poste'] = "C.E.O";

unset( $_SESSION['poste'] ); // Supprimer de la session une donnée.

/*
    Pour détruire totalement la session, par exemple pour déconnecter un utilisateur / vider son panier...
*/

session_destroy();

echo '<pre>';
var_dump($_SESSION);
echo '<pre>';