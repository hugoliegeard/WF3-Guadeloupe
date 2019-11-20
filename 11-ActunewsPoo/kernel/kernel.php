<?php

/**
 * Ici, le fichier Kernel va permettre
 * de charger les composants de notre application.
 * ------------------------------------------------
 * Piste d'amélioration, nous utiliserions une approche OO.
 */

# Chargement du Router
require_once 'middleware/router.php';

# Chargement de Twig
require_once 'middleware/twig.php';

# Chargement de PDO
require_once 'middleware/pdo.php';
