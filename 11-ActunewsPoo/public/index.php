<?php

/*
 * Ici, notre fichier index.php représente
 * notre controleur frontal.
 * -----------------------------------------
 * Il a pour charge de rediriger la requète
 * de l'utilisateur vers le bon controleur
 * en s'aidant des paramètres dans l'URL.
 */


use Symfony\Component\HttpFoundation\Request;

# Autochargement des classes avec Composer
require_once '../vendor/autoload.php';

# Arrivée d'une requète
# Correspond a la requête entrante de notre utilisateur.
$request = Request::createFromGlobals();

# Mise en Place du Container
$container = \App\Model\Container\Container::getInstance();

# On stocke la requète de l'utilisateur dans le container
$container->set('request', $request);
# dump( $container );

# Chargement de la configuration
require_once '../config.php';

# Chargement de l'application
require_once '../app.php';