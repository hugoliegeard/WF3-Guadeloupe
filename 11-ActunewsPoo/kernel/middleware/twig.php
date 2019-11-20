<?php

# 2A. Chargement de Twig
$loader = new \Twig\Loader\FilesystemLoader(PATH_TEMPLATE);
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

# 2B. On stock l'instance de Twig dans notre container.
$container->set('twig', $twig);
# dump( $container );