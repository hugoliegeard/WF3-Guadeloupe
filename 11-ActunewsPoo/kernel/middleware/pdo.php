<?php

# Récupération de l'instance de PDO
$pdo = \App\Model\Db\DbFactory::makePdo();

# Stockage de l'instance dans le container
$container->set('pdo', $pdo);