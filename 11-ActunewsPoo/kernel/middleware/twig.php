<?php

# 2A. Chargement de Twig
use Twig\Extra\String\StringExtension;

$loader = new \Twig\Loader\FilesystemLoader(PATH_TEMPLATE);
$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

$twig->addExtension(new StringExtension());
$twig->addGlobal('request', $container->get('request'));

# 2B. On stock l'instance de Twig dans notre container.
$container->set('twig', $twig);
# dump( $container );