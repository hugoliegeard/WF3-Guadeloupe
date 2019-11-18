<?php

use Symfony\Component\HttpFoundation\Request;

# 1. Arrivée d'une requète
# Correspond a la requête entrante de notre utilisateur.
$request = Request::createFromGlobals();
# dump( $request->get('controller') );

# Récupération des paramètres GET et affectation d'une valeur par défaut.
$controller = 'App\\Controller\\' . ucfirst( $request->get('controller') ) . 'Controller'; // ?? 'DefaultController'; // default
$action     = $request->get('action'); // ?? 'home'; // home

// -- CHARGEMENT DE TWIG ------------------ |

# Récupération du chemin absolu vers le dossier "templates"
define( 'PATH_ROOT', dirname( $request->server->get('SCRIPT_FILENAME'), 2 ) );
define( 'PATH_TEMPLATE', PATH_ROOT . '/templates' );
# dump( PATH_TEMPLATE );

$loader = new \Twig\Loader\FilesystemLoader(PATH_TEMPLATE);
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

// -- ROUTAGE AUTOMATIQUE ------------------ |
# 2. Traitement de la requète

/** @var \Symfony\Component\HttpFoundation\Response $response */
$response = call_user_func_array([ $controller, $action ], []);
# dump( $response );

# 3. On retourne une réponse au client.
$response->send();