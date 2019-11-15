<?php

# Récupération des paramètres GET et affectation d'une valeur par défaut.
# cf. https://www.php.net/manual/fr/language.operators.comparison.php
$controller = ucfirst( $_GET['controller'] ) . 'Controller'; // ?? 'DefaultController'; // default
$action     = $_GET['action']; // ?? 'home'; // home

// -- ROUTAGE AUTOMATIQUE ------------------|
call_user_func_array([ $controller, $action ], []);

// PRIVATE : return and Response / Request