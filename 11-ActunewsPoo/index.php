<?php

/*
 * Ici, notre fichier index.php représente
 * notre controleur frontal.
 * -----------------------------------------
 * Il a pour charge de rediriger la requète
 * de l'utilisateur vers le bon controleur
 * en s'aidant des paramètres dans l'URL.
 */

# Aperçu de $_GET
# echo '<pre>';
# print_r( $_GET );
# echo '</pre>';

# Chargement Automatique des Classes
require_once 'autoload.php';

# Chargement des routes.
require_once 'routes.php';
