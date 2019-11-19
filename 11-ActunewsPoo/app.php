<?php // app.php

# 1. Déduction du Controller et de l'Action
$controller = 'App\\Controller\\' . ucfirst( ( $request->get('controller') ?? DEFAULT_CONTROLLER ) ) . 'Controller'; // ?? 'DefaultController'; // default
$action     = $request->get('action') ?? DEFAULT_ACTION; // home

# 2A. Chargement de Twig
$loader = new \Twig\Loader\FilesystemLoader(PATH_TEMPLATE);
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

# 2B. On stock l'instance de Twig dans notre container.
$container->set('twig', $twig);
# dump( $container );

# 3. Traitement de la requète
/** @var \Symfony\Component\HttpFoundation\Response $response */
$response = call_user_func_array([ new $controller, $action ], []);

# 4. On retourne une réponse au client.
$response->send();