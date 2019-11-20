<?php // app.php

# 1. Chargement du Kernel
require_once 'kernel/kernel.php';

# 2. Traitement de la requète
/** @var \Symfony\Component\HttpFoundation\Response $response */
$response = call_user_func_array([ new $controller, $action ], []);

# 3. On retourne une réponse au client.
$response->send();