<?php

/**
 * Ici, le fichier Kernel va permettre
 * de charger les composants de notre application.
 * ------------------------------------------------
 * Piste d'amélioration, nous utiliserions une approche OO.
 */

# ------- Début du chargement du Kernel ------- #

# Chargement du Router
require_once 'middleware/router.php';

# Chargement de Twig
require_once 'middleware/twig.php';

# Chargement de PDO
require_once 'middleware/pdo.php';

# ------- Fin du chargement du Kernel ------- #

# ------- Kernel is Ready ------- #

/**
 * Récupération des classes à charger par le Kernel
 * dans l'application.
 */
$onKernelReady = include_once 'event/onKernelReady.php';

# On parcours les classes du tableau
foreach ( $onKernelReady as $class ) {

    # On instancie chaque classe
    $obj = new $class;

    # On vérifie que chaque classe est bien une instance de KernelEventInterface
    if ( $obj instanceof \App\Model\Kernel\KernelEventInterface) {

        # On execute la fonction load
        $obj->load();
    }

}

