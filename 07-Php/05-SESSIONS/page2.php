<?php

session_start(); // Lorsque j'effectue un session_start, la session n'est pas recréée, car elle existe déjà.

// -- Il faut OBLIGATOIREMENT déclarer session_start() pour accéder à $_SESSION.

echo '<pre>';
var_dump($_SESSION);
echo '<pre>';