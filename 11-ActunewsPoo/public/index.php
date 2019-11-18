<?php

/*
 * Ici, notre fichier index.php représente
 * notre controleur frontal.
 * -----------------------------------------
 * Il a pour charge de rediriger la requète
 * de l'utilisateur vers le bon controleur
 * en s'aidant des paramètres dans l'URL.
 */

# Chargement Automatique des Classes
# require_once 'autoload.php';

# Autochargement des classes avec Composer
require_once '../vendor/autoload.php';

# Chargement des routes.
require_once '../app.php';

# Aperçu de $_GET
# dump( $_GET );
# dump( dirname($request->server->get('SCRIPT_FILENAME'), 2)  );