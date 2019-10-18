<!--
    Tout d'abord,  nous pouvons écrire du HTML dans un
    fichier ayant l'extension PHP. L'inverse n'est pas possible.
-->

<style>
    h2 {
        margin:0;
        font-size: 15px;
        color: red;
    }
</style>

<h2>Ecriture et Affichage</h2>

<?php

    echo 'Bonjour'; // Echo est une instruction qui nous permet d'effectuer un affichage.

    echo '<br>'; // Nous pouvons également y mettre du HTML.

    echo '<hr><h2>Commentaires</h2>'; // Si vous vous rendez dans le code-source, vous ne verrez pas le PHP ; car le langage est interprété !

?>

<strong> Bonjour </strong>

<?= 'Hello World !'; ?> <!-- Le = remplace le echo. -->

<!-- 
    Il est possible de fermer et ré-ouvrir php
    pour mélanger du code HTML & PHP.
-->

<?php

    echo 'Texte'; // Ceci est un commentaire sur une ligne.
    echo 'Texte'; /* Ceci est un commentaire 
                        sur plusieurs lignes. */
    print 'Texte'; # Ceci est un commentaire sur une ligne.

    /*
        Print est une autre instruction d'affichage.
        Il n'y à pas de différence entre print et echo.
        -----------------------------------------------
        Vous n'êtes pas obligé de fermer PHP avec ' ?> '.
        Vous pouvez fermer et ouvrir plusieurs fois PHP.
    */

    echo '<hr><h2>Variable PHP : Types / Déclaration / Affection</h2>';

    // Déclaration d'une variable PHP avec le signe $

    $a = 127 ; // Affectation de la valeur 127 dans la variable nommée: a
    $b = 1.5 ; // Affectation de la valeur 1.5 dans la variable nommée: b

    // $nom_de_ma_variable = ma_valeur...

    echo gettype( $a ); // Il s'agit d'un Entier : integer
    echo '<br>';
    echo gettype( $b ); // Il s'agit d'un nombre à virgule : double

    $a = "une chaîne";
    $b = "127";

    echo '<br>';
    echo gettype( $a ); // Il s'agit d'un string
    echo '<br>';
    echo gettype( $b ); // String est equivalent à varchar de MySQL.

    $a = true;
    $b = FALSE;

    echo '<br>';
    echo gettype( $a ); // boolean
    echo '<br>';
    echo gettype( $b ); // boolean

    /*
        NOTA BENE : Nous pouvons appeler une variable ' a2 ' mais pas
        ' 2a '. Elle peut contenir des chiffres, mais ne doit pas 
        commencer par un chiffre.
    */

    echo '<hr><h2>La Concaténation</h2>';

    /*
        On utilise le point ou la virgule pour concaténer.
    */

    $prenom = "Hugo";

    echo 'Bonjour ' . $prenom . '<br>';
    echo 'Bonjour ' , $prenom , '<br>';

    /*
        Il est possible de mélanger les points et les virgules ;
        Ce n'est pas une bonne pratique. A NE PAS FAIRE.
    */

    echo "Bonjour $prenom <br>"; // Dans les guillemets, la variable est évaluée.
    echo 'Bonjour $prenom <br>'; // Dans les quotes, la variable n'est PAS evaluée !

    // ------------------------------------

    echo '<hr><h2>Constante et Constante Magique !</h2>';

    define('IMPOSSIBLE_A_MODIFIER', 'Valeur de ma constante');
    echo IMPOSSIBLE_A_MODIFIER . '<br>';

    /*
        Par convention, une constante se déclare toujours en MAJUSCULE.
        --------------------------------------------------------------
        Les constantes sont utiles pour sauvegarder vos informations
        de connexion à une BDD par exemple.
    */

    // -- Les constantes magiques :

    echo __FILE__  . '<br>'; // Chemin complet vers mon fichier.
    echo __DIR__  . '<br>'; // Chemin vers mon dossier.
    echo __LINE__  . '<br>'; // Affiche le numéro de la ligne.

    // ------------------------------------

    echo '<hr><h2>Les Opérateurs Arithmétique</h2>';

    $a = 10;
    $b = 5;

    echo $a + $b . '<br>'; // Affiche 15
    echo $a - $b . '<br>'; // Affiche 5
    echo $a * $b . '<br>'; // Affiche 50
    echo $a / $b . '<br>'; // Affiche 2

    // -- Opération / Affectation

    $a = $a + $b; // Ici, $a vaut 10... donc 10 + 5 = 15
    $a += $b; // Ecriture simplifiée Même chose que $a = $a + $b;
    $a -= $b; // Même chose que $a = $a - $b ;
    $a *= $b; // Même chose que $a = $a * $b ;
    $a /= $b; // Même chose que $a = $a / $b ;

    $a += 1; // J'incrémente de 1. J'ajoute +1 à ma variable.
    $a++; // Même chose que $a += 1; Ecriture simplifiée.
    $a--; // Même chose que $a -= 1; Ecriture simplifiée.

    echo '<hr><h2>Structures Conditionelles (if / else)</h2>';

    /* 
        Isset & Empty
        empty = test si une variable est égale à 0, est vide ou non définie.
        isset = test uniquement si une variable est définie / existe.
    */

    $var1 = "test";
    $var2 = "";

    if ( empty( $var2 ) ) { // Si $var2 est égale à 0, est vide ou n'existe pas.
        echo '0, vide ou non définie<br>';
    } else {
        echo 'Ma variable est définie<br>';
    }

    if ( isset( $var2 ) ) { // Si existe $var2 ?
        echo 'var2 existe<br>';
    } else {
        echo 'var2 n\'existe pas !<br>';
    }

    $prenom = "0";
    $nom = "LIEGEARD";

    if (isset($prenom)) echo "Attention, prenom existe !";
    if (empty($prenom)) echo "Attention, vous avez oublié de remplir votre prénom";

    echo '<hr>';

    $a = 2;
    $b = 5;
    $c = 8;

    if ( $a > $b ) { // Si A est supérieur à B
        print "A est bien supérieur à B.<br>";
    } else {
        print "non, c'est B qui est supérieur à A.<br>";
    }

    if ( $a > $b && $b > $c ) { // Si A est supérieur à B et que dans le même temps B est supérieur à C.
        print "Tous est OK pour les deux conditions.<br>";
    }

    if ( $a == 2 || $b > $c ) { // Si A contient 2 ou que B est supérieur à C
        print "Tout est OK pour au moins l'une des deux conditions.<br>";
    } else {
        // Aucune des deux sont bonnes.
        print "Nous sommes dans le ELSE";
    }

    /*
        NOTA BENE :
        Le double égale == permet de vérifier une information
        à l'intérieur d'une variable.
    */

    if ( $a == 10 XOR $b == 6 ) { // Seulement l'une des 2 conditions doit être valide. Mais pas les deux en même temps.
        echo 'Ok, condition exclusive.';
    }

    /*
        Forme contracté du IF...
        Une ecriture ternaire, un if ternaire
        Le "?" remplace le IF (alors), le ":" remplace le ELSE (sinon)
    */

    echo ($a == 10) ? "a est égal à 10<br>" : "a n'est pas égal à 10<br>";

    // -- Comparaison

    $a = 1;
    $b = "1";

    if ( $a == $b ) echo "Les deux variables sont égales";
    if ( $a === $b ) echo "Les deux variables sont strictement égales";

    /*
        /!\ A NE PAS OUBLIER /!\
        = Affectation
        == Comparaison des valeurs
        === Comparaison des valeurs et des types
    */

    echo '<hr><h2>Condition Switch</h2>';

    $couleur = 'bleu';

    switch($couleur) {
        case 'bleu' :
            echo 'Vous aimez le bleu';
            break;
        case 'rouge' :
            echo 'Vous aimez le rouge';
            break;
        case 'jaune' :
            echo 'Vous aimez le jaune';
            break;
        case 'vert' :
            echo 'Vous aimez le vert';
            break;
        default: // Cas par défaut, on ne rentre dans aucun des cas précédent.
            echo "Vous n'aimez ni le bleu, ni le rouge, ...";
            break;
    }

    /*
        EXERCICE :
        Pouvez-vous faire la même chose que le switch
        ... avec des if/else ? est-ce possible ?
    */

    if ( $couleur == "bleu" ) {
        echo 'Vous aimez le bleu';
    } else if ($couleur == 'rouge') {
        echo 'Vous aimez le rouge';
    } else if ($couleur == 'jaune') {
        echo 'Vous aimez le jaune';
    } else if ($couleur == 'vert') {
        echo 'Vous aimez le vert';
    } else {
        echo "Vous n'aimez ni le bleu, ni le rouge,  ...";
    }

    // ------------------------------------------------------------

    echo '<hr><h2>Les Fonctions prédéfinies</h2>';

    // A regarder : http://overapi.com/php
    
    /*
        Exemple avec la fonction date() qui permet
        de renvoyer la date du jour au format souhaité.
        -------------------------------------------------
        https://www.php.net/manual/fr/function.date.php
    */

    echo '<br>Date : <br>';
    print date('d/m/Y');
    echo '<br>';
    print date('Y M d D');

    echo '<hr><h2>Les Fonctions prédéfinies : Les String</h2>';

    $email1 = "hugo@wf3.fr";
    echo strpos( $email1, "@" );

    /*  
        La fonction strpos() indique la position
        du caractère @ dans la chaine.
        On commence à 0.
    */

    $email2 = "hugo";
    echo strpos( $email2, "@" );
    
    /*
        Cette ligne ne sort rien, pourtant il y à
        bien une valeur. FALSE : boolean.
        -----------------------------------
        Avec un var_dump on aperçoit le FALSE si le
        caractère @ n'est pas trouvé.
        -------------------------------------
        var_dump est une instruction d'affichage
        améliorée que l'on utilise régulièrement
        en phase de développement.
    */

    echo '<br>';
    var_dump( strpos( $email2, "@" ) );

    /*
        strpos() permet de trouver la position
        d'un caractère dans une chaine.
        ----------------------------------------
        Valeur de retour :
        Succès : int Entier
        Echec : boolean FALSE
        ----------------------------------------
        Paramètres :
        1. La chaine dans laquelle effectuer la recherche
        2. Le caractère / l'information à chercher
    */

    $phrase = "Je suis une phrase et j'aime ce que je suis.";
    echo iconv_strlen( $phrase ) . '<br>' ;

    /*
        iconv_strlen() Retourne le nombre de 
        caractères d'une chaîne.
        ----------------------------------------
        Valeur de retour :
        Succès : int Entier
        Echec : boolean FALSE : 0
        ----------------------------------------
        Paramètres :
        1. La chaine pour laquelle nous
        souhaitons connaitre la taille.
    */

    $texte = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium dicta, quod harum odio saepe autem fuga natus tempora cupiditate! Consequatur minus illo nostrum exercitationem, porro sapiente tempora ducimus illum quod.";

    echo substr( $texte, 0, 50 ) . '... <a href="#">Lire la suite</a>';

    /*
        substr() Retourne une partie d'une' chaîne
        ----------------------------------------
        Valeur de retour :
        Succès : string
        Echec : boolean FALSE
        ----------------------------------------
        Paramètres :
        1. La chaîne d'entrée ( Celle à couper )
        2. Start ; Position de début
        3. length : Nb de caractères souhaités
    */

    echo '<hr><h2>Les Fonctions Utilisateur</h2>';

    /*
        Les fonction qui ne sont pas prédéfinie en PHP
        sont déclaré puis exécuté par l'utilisateur.
        --------------------------------------------
        Autrement dit, vous avez la possibilité de 
        créer vos propres fonctions PHP.
        --------------------------------------------
        Réalisons une fonction permettant de tirer
        un trait sur la page.
    */

    function separator() { // Cette fonction ne reçoit pas d'argument
        echo "<br><hr><br>";
    }

    separator(); // Execution de notre fonction.

    /*
        Fonction avec arguments
        Les $arguments sont des paramètres fournis à la fonction.
        Ils lui permettent de compléter ou modifier son comportement
        initialement prévu.
    */

    function bonjour( $prenom ) {
        return "Bonjour $prenom <br>";
    }

    // Execution
    echo bonjour("Hugo");
    echo bonjour("Léna");
    echo bonjour("Mélissa");

    // --------------------------------

    separator();

/*
    EXERCICE :
    1. Créer une fonction permettant de calculer la somme de 2 nb.
    2. Créer une fonction permettant de générer des titres h3
    3. Créer une fonction permettant de calculer la TVA 20% (1.2)
    4. Créer une fonction permettant de calculer la TVA plusieurs taux. normal : 20% ou 1.2 | réduit : 5.5% ou 1.055

    5. BONUS : Réaliser une fonction permettant de générer une accroche de X caractères passé paramètres, sans couper de mot.

    6. BONUS : Challenge Réaliser une fonction PHP permettant de
    convertir une chaine en slug. slugify().
*/

// 1. Créer une fonction permettant de calculer la somme de 2 nb.

function addition( $nb1, $nb2 ) {
    return $nb1 + $nb2;
}

$resultat = addition(130, 15);
echo $resultat;

// 2. Créer une fonction permettant de générer des titres h3

echo titre('Je suis développeur web !!!!'); // Il est possible d'executer une fonction avant qu'elle soit déclarée dans le code.

function titre($h3) {
    return "<h3>$h3</h3>"; // A partir du 'return' on quitte la fonction. Tout ce qui se trouve après le return n'est, pas executé.
    echo 'test'; // Ne s'execute pas a cause du return juste avant.
}

// 3. Créer une fonction permettant de calculer la TVA 20% (1.2)
function calculTva( $montantHT ) {
    return $montantHT * 1.2;
}

echo '20EUR HT soit ' . calculTva(20) . 'EUR TVA<br>';
echo '40EUR HT soit ' . calculTva(40) . 'EUR TVA<br>';

// 4. Créer une fonction permettant de calculer la TVA plusieurs taux. normal : 20% ou 1.2 | réduit : 5.5% ou 1.055
function calculTvaTaux( $montantHT, $tauxTva = 1.2 ) {
    return $montantHT * $tauxTva;
}

echo '10EUR HT soit ' . calculTvaTaux(10) . 'EUR TVA<br>';
echo '10EUR HT soit ' . calculTvaTaux(10, 1.055) . 'EUR TVA réduite<br>';

// 5. BONUS : Réaliser une fonction permettant de générer une accroche de X caractères passé paramètres, sans couper de mot.

// 6. BONUS : Challenge Réaliser une fonction PHP permettant de convertir une chaine en slug. slugify().

// ----------------------------------------------------------------------

separator();

echo '<h2>Les Boucles</h2>';

    for( $i = 0 ; $i < 10 ; $i++ ) {
        echo $i . '<br>';
    }

    // EXERCICE : En partant de l'exemple ci-dessus et en utilisant une boucle for ; réalisez un select allant de 1 à 31. Correspondant au nombre de jour dans un mois.

    echo '<select>';
    echo '<option>1</option>';
    echo '<option>2</option>';
    echo '<option>3</option>';
    echo '</select>';

    echo '<select>';
        for($i = 1 ; $i <= 31 ; $i++) {
            echo "<option>$i</option>";
        }
    echo '</select>';

    separator();

?> <!-- Je ferme PHP donc je suis dans mon HTML -->

<table border="1">
    <tr>
        <?php
            for($i = 0 ; $i <= 9 ; $i++) {
                echo "<td>$i</td>";
            }
        ?>
    </tr>
</table>

<!-- Je retourne dans PHP -->
<?php

// Même exemple 100% PHP

echo '<table border="1"><tr>';
    for($i = 0 ; $i <= 9 ; $i++) {
        echo "<td>$i</td>";
    }
echo '</tr></table>';

// ----------------------------------------

separator();

echo '<h2>Les Tableaux / Array</h2>';

/*
    Un array, ou tableau est une variable qui
    contient plusieurs valeurs organisé sous
    forme de "clé -> valeur".
    -----------------------------------------
    |   0   |   1   |   2   |   3   |   4   |
    -----------------------------------------
    |  Léna |  Nia  | Angel.| Astrid| Meli. |
    -----------------------------------------
*/

// -- Déclaration et remplissage d'un tableau indexé
$apprenantes = array('Léna', 'Nia');
$apprenantes = ['Léna', 'Nia', 'Angélique', 'Astrid', 'Mélissa'];

// -- Afficher les valeurs de notre tableau $apprenantes
# echo $apprenantes; // Ne marche pas Array to string conversion
echo $apprenantes[1] . '<br>'; // Nia
echo $apprenantes[2] . '<br>'; // Angélique
echo '$apprenantes est de type : ' . gettype( $apprenantes );

/*
    Pour afficher la valeur d'une clé d'un tableau
    on utilise : monTableau[ cle ];
    cle = indice = index = synonymes
 */

 echo '<pre>';
    # var_dump( $apprenantes );
    print_r( $apprenantes );
 echo '</pre>';

 /*
    Les tableaux associatifs :
    Les clés ne sont plus numérique, mais sous
    forme de string.
    ----------------------------------------------------
    |   prenom   |     nom    |   telephone  |   age   |
    ----------------------------------------------------
    |    Hugo    |  LIEGEARD  |  0783971515  |  29ans  |
    ----------------------------------------------------
 */

 $contact = [
     // cle       =>      valeur
     'prenom'     =>      'Hugo',
     'nom'        =>      'LIEGEARD',
     'telephone'  =>      '0783971515',
     'age'        =>      '29ans',
     'adresse'    =>      [
                                'rue'   => 'Rue des Trois Poiriers',
                                'ville' => 'Pointe-a-Pitre',
                                'cp'    => '78190',
                                'pays'  => [
                                    'nom'   => 'France',
                                    'code' => 'FR'
                                ],
                          ]
 ];

 echo '<h1>Bonjour ' . $contact['prenom'] 
                     . ' ' 
                     . $contact['nom'] 
                     . '<br><small>'
                     . $contact['adresse']['ville']
                     . ' '
                     . $contact['adresse']['pays']['nom']
                     . '</small>'
                     . '</h1>';

    $mesContacts = []; // Déclarer un tableau vide.
    $mesContacts[] = 'Hugo'; // Ajouter un élément dans un tableau
    $mesContacts[] = 'Nia'; // Indice affecter automatiquement par PHP
    $mesContacts[10] = 255; // Indice préciser manuellement
    $mesContacts[] = 'Aurélie'; // PHP continu après a 11.

    echo '<pre>';
        print_r( $mesContacts );
    echo '</pre>';

    $contacts = [];
    $contacts[] = [
        'prenom' => 'Hugo',
        'nom' => 'LIEGEARD'
    ];

    $contacts[] = [
        'prenom' => 'Nia',
        'nom' => 'VITALIS'
    ];

    $contacts[] = [
        'prenom' => 'Aurélie',
        'nom' => 'NABAJOTH'
    ];

    $contacts[] = [
        'prenom' => 'Gaëlle',
        'nom' => 'CHARLES-BELAMOUR'
    ];

    echo '<pre>';
        print_r( $contacts );
    echo '</pre>';

    // Afficher les prénoms de chaque contacts :
    echo $contacts[0]['prenom'] . '<br>';
    echo $contacts[1]['prenom'] . '<br>';
    echo $contacts[2]['prenom'] . '<br>';

    /*
        Faire une boucle afin d'afficher les prénoms
        des contacts dans un paragraphe.
    */

    // Avec la boucle FOR

    /*
        NOTA BENE :
        count et sizeof me retourne la dimension de mon tableau.
        Autrement dit, le nombre d'éléments.
        Pas de différence entre les deux fonctions.
    */

    echo 'La taille de mon tableau est : ' . count($contacts) . '<br>';
    echo 'La taille de mon tableau est : ' . sizeof($contacts) . '<br>';

    for ( $i = 0 ; $i < count($contacts) ; $i++ ) {
        echo '<p>' . $contacts[$i]['prenom'] . '</p>';
    }

    separator();

    // La boucle FOREACH

    /*
        Quand il y a 2 variables ($index et $valeur) :
        La 1ère parcours la colonne des indices (index)
        La 2nd parcours la colonne des valeurs.
    */

    foreach ($contacts as $index => $valeur) {
        echo 'Mon contact ' . $valeur['prenom'] . ' est a index ' . $index . '<br>';
    }

    // Quand il y a 1 variable, c'est la colonne des valeurs.

    foreach ($contacts as $contact) {
        echo 'Mon contact ' . $contact['prenom'] . '<br>';
    }

    /*
    EXERCICE :
    En utilisant une ou plusieurs boucles foreach
    afficher les informations (Cle / Valeur) du contact
    $contact.

    BONUS : Vous utiliserez des listes à puces <ul><li>
*/

separator();

$contact = [
    // cle      => valeur
    'prenom'    => 'Rodrigue',
    'nom'       => 'NOUEL',
    'telephone' => [
        'fixe' => '0596 77 68 56',
        'port' => '0696 67 45 34',
        'fax'  => '0596 67 56 45'
    ],
    'age'       => '43 ans',
    'adresse'   => [
        'rue'   => 'Rue de la Maurine',
        'ville' => 'Fort-de-France',
        'cp'    => '97200'
    ]
];

$content = '<ul>';

// Je parcours mon tableau $contact
// Ici $cle prend successivement les valeurs prenom, nom, ...
foreach ($contact as $cle => $valeur) {

    // Si au cours d'une des itérations (tour de boucle) 
    // ma $valeur est un tableau...
    if ( is_array( $valeur ) ) {
        
        // --- Alors, je parcours le nouveau tableau
        $content .= "<li><strong>$cle</strong> : </li>";
        $content .= "<ul>";

        foreach ($valeur as $key => $value) {
            $content .= "<li><strong>$key</strong> : $value</li>";
        }

        $content .= "</ul>";

    } else {
        // -- Sinon, ma $valeur n'est pas un tableau. Je l'affiche...
        $content .= "<li><strong>$cle</strong> : $valeur</li>";
    }
}

$content .= '</ul>';
echo $content;

// ------------------------

$txt = 'Lorem ';
$txt .= 'ipsum ';
$txt .= 'dolor';

$txt = 'Lorem ' . 'ipsum ' . 'dolor';

echo $txt;

separator();

// Affiche les infos de PHP
//phpinfo();

?>






























<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>