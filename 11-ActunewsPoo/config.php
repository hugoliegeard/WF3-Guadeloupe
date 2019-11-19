<?php

# Configuration par défaut
define( 'DEFAULT_CONTROLLER', 'default' );
define( 'DEFAULT_ACTION', 'home' );

# Configuration des Paths
define( 'PATH_ROOT', dirname( $request->server->get('SCRIPT_FILENAME'), 2 ) );
define( 'PATH_TEMPLATE', PATH_ROOT . '/templates' );

