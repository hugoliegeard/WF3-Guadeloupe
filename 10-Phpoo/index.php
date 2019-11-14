<?php

# Importation de notre classe Ecole
require_once 'Ecole.php';

# Importation de notre classe Classe
require_once 'Classe.php';

# Importation de notre classe Eleve
require_once 'Eleve.php';

/* --
    Création d'une instance de la classe Ecole.
    Ici, notre variable $ecole est un objet de
    la classe Ecole. Elle à accès à l'ensemble
    des propriétés et méthodes qui la compose.
-- */
# $ecole = new Ecole();
$ecole = new Ecole(
    'WF3 Guadeloupe',
    'ASFO - ZI Bergevin 97110 PTP',
    'Nathalie BAUSSET',
    14
);

# Affecter des valeurs a notre objet.
# $ecole->nom = 'WF3 Guadeloupe';
# $ecole->adresse = 'ASFO - ZI Bergevin 97110 PTP';
# $ecole->directeur = 'Nathalie BAUSSET';
# $ecole->effectif = 14;

echo '<pre>';
print_r( $ecole );
echo '</pre>';

# Afficher le nom de l'école dans un h1
# echo '<h1>' . $ecole->nom . '</h1>';
echo '<h1>' . $ecole->getNom() . '</h1>';
echo '<p>' . $ecole->getDirecteur() . '</p>';
echo '<p>' . $ecole->getEffectif() . '</p>';

# Je veux changer le nom de l'école ?
$ecole->setNom( 'Webforce3 Guadeloupe !' );

echo '<pre>';
print_r( $ecole );
echo '</pre>';

/* --
    CONSIGNE : En vous appuyant sur notre travail
    avec la classe Ecole ; créez maintenant les
    classes "Classe" et "Eleve" dans des fichiers
    séparés.
    ---------------------------
    Classe.php et Eleve.php : Propriétés,
        Constructeur, Getters & Setters.
-- */

# Création des Eleves
$eleve1 = new Eleve('VITALIS', 'Nia', 47);
$eleve2 = new Eleve('TESSIER', 'Mélissa', 23);
$eleve3 = new Eleve('BOISSERON', 'Léna', 29);
$eleve4 = new Eleve('CAZALON', 'Aurélie', 18);

# Création des Classes
$classe1 = new Classe('Front', 'Raphaël ELSO', 14);
$classe2 = new Classe('Back', 'Excellentissime Hugo LIEGEARD', 14);
$classe3 = new Classe('Fullstack', 'Soeur Angélique JEAN-NOEL', 14);

# Problématique
# Comment affecter chaque élève dans une classe ?
$classe1->ajouterUnEleve( $eleve1 );
$classe1->ajouterUnEleve( $eleve2 );

$classe2->ajouterUnEleve( $eleve2 );
$classe2->ajouterUnEleve( $eleve3 );

$classe3->ajouterUnEleve( $eleve1 );
$classe3->ajouterUnEleve( $eleve4 );

echo '<pre>';
print_r( $classe1 );
print_r( $classe2 );
print_r( $classe3 );
echo '</pre>';

$ecole->ajouterUneClasse( $classe1 );
$ecole->ajouterUneClasse( $classe2 );
$ecole->ajouterUneClasse( $classe3 );

echo '<pre>';
print_r( $ecole );
echo '</pre>';

/* --
    CONSIGNE : En partant de l'objet $ecole ; affichez la liste
    ol, ul, li des classes et pour chaque classes les étudiants.
-- */