<?php

/**
 * Ici dans mon tableau je vais
 * déclarer toutes les classes
 * que je souhaite charger après
 * l'initialisation du kernel.
 */
return [
    'TwigExtension' => \App\Model\Twig\TwigExtension::class, # Chemin complet vers notre classe. ( namespace + nom de la classe )
];