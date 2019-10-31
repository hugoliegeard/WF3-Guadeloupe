<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=actunews', 'root', '');
    //$db = new PDO('mysql:host=localhost;dbname=actunews', 'root', 'root'); // pour mac
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    print "Erreur de conenxion!: " . $e->getMessage() . "<br/>";
    die();
}
