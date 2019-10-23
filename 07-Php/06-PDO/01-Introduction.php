<?php

/*
    1. Créer une base de donnée : actunews
    2. Créer les tables suivantes :

    - categorie - (id), nom
    - auteur -> (id), prenom, nom, email, password
    - article (id), titre, contenu, image, date_creation,
        categorie_id (lien avec la table categorie),
        auteur_id (lien avec la table auteur).

*/

// Mise en place de la connexion avec la BDD
// Pour connecter PHP et MySQL on utilisera une librairie : PDO
// PDO me permettra d'effectuer des opérations CRUD sur ma base.

// Args : 1 (serveur + bdd), 2 identifiant, 3 mot de passe.
// cf: https://www.php.net/manual/fr/pdo.connections.php
// $db = new PDO('mysql:host=localhost;dbname=actunews', 'root', '');

/*
    Le try / catch permet en cas d'erreur de l'attraper
    pour effectuer une action particulière :
        - Afficher un message d'erreur ;
        - Envoyer un email a l'administrateur ;
        - Effectuer une redirection ...
    ----------------------------------------
    Cela nous permet aussi de nous assurer
    des erreurs retournées à l'utilisateur.
*/
 
try {

    $db = new PDO('mysql:host=localhost;dbname=actunews', 'root', '');

    // En environnement de développement on active les erreurs SQL.
    // https://www.php.net/manual/fr/pdo.error-handling.php
    // PDO::ERRMODE_SILENT : N'affiche pas les erreurs SQL. (prod)
    // PDO::ERRMODE_WARNING : Affiche l'erreur sans couper le script. (dev)
    // PDO::ERRMODE_EXCEPTION : Affiche l'erreur et stop le script.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    // Comment je souhaite que PDO me retourne les informations
    // https://www.php.net/manual/fr/pdostatement.fetch.php
    // PDO::FETCH_ASSOC : Tableau Associatif
    // PDO::FETCH_NUM : Tableau Indexé
    // PDO::FETCH_OBJ : Un Objet Anonyme
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {

    print "Erreur !: " . $e->getMessage() . "<br/>";
    // header('Location: https://google.fr/search?q=' . $e->getMessage() );
    die();
    
}

// Dans la vrai vie, pour mes projets, j'aurais au final le code suivant :

try {
    $db = new PDO('mysql:host=localhost;dbname=actunews', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

var_dump( $db );

# --------------------- INSERER DES DONNEES --------------------- #

/*
    Avec $db->exec() je peux executer une requète SQL.
    /!\ Pas de protection, pas de vérification /!\ 
*/
# $db->exec('
#     INSERT INTO `auteur` (`prenom`, `nom`, `email`, `password`) 
#     VALUES ("Nia", "VITALIS", "nia.v@actu.news", "actunews");
# ');

/*
    Avec $db->prepare() je peux préparer ma requète
    avant de l'executer.
    Ainsi, je peux faire des vérifications préalablement.
*/
$query = $db->prepare('
    INSERT INTO `auteur` (`prenom`, `nom`, `email`, `password`) 
        VALUES (:prenom, :nom, :email, :password);
');

/*
    bindValue va me permettre d'associer une valeur à chaque paramètre.
    PDO::PARAM_STR : représente une valeur VARCHAR ou texte en SQL.
    Cela me permet de m'assurer du type de donnée insérer dans ma base.
    Il existe d'autres types :
        - PDO::PARAM_BOOL ;
        - PDO::PARAM_NULL ;
        - PDO::PARAM_INT.
*/

$query->bindValue(':prenom', 'Angélique', PDO::PARAM_STR);
$query->bindValue(':nom', 'JEAN-NOEL', PDO::PARAM_STR);
$query->bindValue(':email', 'angelique.jn@actu.news', PDO::PARAM_STR);
$query->bindValue(':password', 'actunews', PDO::PARAM_STR);

# if ( $query->execute() ) {

    // Traitement en cas de succès
    // Envoi d'un email...
    // Envoi d'une notification...

# };

/*
    Permet de connaitre le dernier ID a avoir
    été inséré dans la base de données.
*/
$idAuteur = $db->lastInsertId();
var_dump( $idAuteur );

/*
    EXERCICE :
        A. Avec l'aide d'une requète préparé, insérer la catégorie "Sciences"

        B. Avec l'aide d'une requète préparé, insérer un article dans la catégorie Politique de l'auteur de votre choix.
*/

$query = $db->prepare('
    INSERT INTO `categorie` (`nom`) 
        VALUES (:nom);
');

$query->bindValue(':nom', 'Sciences', PDO::PARAM_STR);
// $query->execute();

$query = $db->prepare('
    INSERT INTO `article` (`titre`, `contenu`, `image`, `categorie_id`, `auteur_id`) 
        VALUES (:titre, :contenu, :image, :categorie_id, :auteur_id);
');

$query->bindValue(':titre', '<h1>Ceci est un titre</h1>', PDO::PARAM_STR);
$query->bindValue(':contenu', '<p>Lorem ipsum dolor...</p>', PDO::PARAM_STR);
$query->bindValue(':image', 'ceci-est-un-titre.jpg', PDO::PARAM_STR);
$query->bindValue(':categorie_id', 1, PDO::PARAM_INT);
$query->bindValue(':auteur_id', 4, PDO::PARAM_INT);
// $query->execute();

# --------------------- RECUPERER DES DONNEES --------------------- #

$query = $db->query('SELECT * FROM auteur');
var_dump( $query );
var_dump( $query->rowCount() ); // Nb de résultat de ma requète

// Pour récupérer un auteur
# $auteur = $query->fetch(PDO::FETCH_NUM);
# $auteur = $query->fetch(PDO::FETCH_BOTH);
# $auteur = $query->fetch(PDO::FETCH_OBJ);
$auteur = $query->fetch();

echo '<pre>';
print_r( $auteur );
print_r( $query->fetch() ); // Récupérer le résultat suivant dans la BDD
print_r( $query->fetch() ); // Ainsi de suite ...
echo '</pre>';

// Pour plus de simplicité, utilisons une boucle
echo '<hr>';

$query = $db->query('SELECT * FROM categorie');
$categories = $query->fetchAll();

/*
    J'obtiens ici, un tableau indexé à 2D, avec pour chaque index,
    un tableau associatif de catégories.
*/

echo '<pre>';
print_r( $categories );
print_r( $categories[2]['nom'] );
echo '</pre>';

/*
    EXERCICE I : Parcourir tous les articles du fetchAll avec une boucle
    foreach(). Vous afficherez le titre de chaque article dans un <h3>.

    EXERCICE II : Parcourir tous les articles du fetch() avec une boucle
    while(). Vous afficherez le titre de chaque article dans un <h3>.
*/  

$query = $db->query('SELECT * FROM article');
$articles = $query->fetchAll();

foreach ($articles as $article) {
    echo '<h3>' . $article['titre'] . '</h3>';
}

// --------- Avec While --------- //
echo '<hr>';

$query = $db->query('SELECT * FROM article');
while( $article = $query->fetch() ) {
    echo '<h3>' . $article['titre'] . '</h3>';
}

/*
    Avec la boucle FETCH, il n'y a pas un tableau
    avec tous les enregistrements. Mais, un tableau
    PAR enregistrement. Soit un tableau associatif par
    article.
    -----------------------------------------------------------------------
    Avec la boucle FOREACH, j'aurais un tableau qui
    contiendra tous mes enregistrements.
    -----------------------------------------------------------------------
    MEMO :
        - Votre requète retourne plusieurs résultats : UNE BOUCLE !
        - Votre requète ne doit sortir qu'un unique résultat : PAS DE BOUCLE
        - Votre requète ne sort qu'un résultat, mais peut potentiellement en sortir plusieurs : UNE BOUCLE !
    ------------------------------------------------------------------------
*/

/*
    On peux s'appuyer sur les données transmisent dans l'URL ($_GET)
    pour récupérer des informations dans la base de données.
*/
// print_r( $_GET['id'] );
$idArticle = isset($_GET['id']) ? $_GET['id'] : 0;

$query = $db->prepare('
    SELECT * FROM article
        WHERE id = :id
'); // :id est un paramètre.

$query->bindValue(':id', $idArticle, PDO::PARAM_INT); // On s'assure que l'ID est bien un entier.

$query->execute(); // J'execute ma requète
$article = $query->fetch(); // Je récupère le résultat

echo '<hr>';
echo '<pre>';
    print_r($article);
    print_r($article['titre']);
echo '</pre>';