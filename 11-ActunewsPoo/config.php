<?php

# Configuration par défaut
define( 'DEFAULT_CONTROLLER', 'default' );
define( 'DEFAULT_ACTION', 'home' );

# Configuration des Paths
define( 'PATH_ROOT', dirname( $request->server->get('SCRIPT_FILENAME'), 2 ) );
define( 'PATH_TEMPLATE', PATH_ROOT . '/templates' );

# Connexion à la BDD
define( 'DB_HOST', 'localhost' );
define( 'DB_NAME', 'actunews' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '' );