<?php

# Récupération des paramètres GET et affectation d'une valeur par défaut.
# cf. https://www.php.net/manual/fr/language.operators.comparison.php
$controller = ucfirst( $_GET['controller'] ) . 'Controller'; // ?? 'DefaultController'; // default
$action     = $_GET['action']; // ?? 'home'; // home

// -- ROUTAGE AUTOMATIQUE ------------------|

$obj = new $controller(); // DefaultController, AdminController, ...
$obj->$action(); // ->home()

// Approche Dynamique
//$$controller = new $controller();
//${$controller}->$action();

// -- ROUTAGE MANUEL ------------------|

// -- DEFAULT CONTROLLER
# Maintenant que nous avons l'autoload, nous pouvons
# commenter les require_once.
# require_once 'src/Controller/DefaultController.php';
# require_once 'src/Controller/MemberController.php';
//$defaultCtrl = new DefaultController();
//$memberCtrl  = new MemberController();

//if ( $controller == 'default' && $action == 'home' ) {
//    $defaultCtrl->home();
//}
//
//if ( $controller == 'default' && $action == 'category' ) {
//    $defaultCtrl->category();
//}
//
//if ( $controller == 'default' && $action == 'article' ) {
//    $defaultCtrl->article();
//}

// -- MEMBER CONTROLLER

//if ( $controller == 'membre' && $action == 'register' ) {
//    $memberCtrl->register();
//}
//
//if ( $controller == 'membre' && $action == 'login' ) {
//    $memberCtrl->login();
//}