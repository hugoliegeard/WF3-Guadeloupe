<h1>Page 2</h1>

<?php

/*
    On peut accéder aux données de l'URL grâce à $_GET.
    $_GET est une superglobale, elle s'écrit toujours en MAJ.
    S'il n'y a aucune information dans l'URL alors $_GET est 'empty'.
*/

echo '<pre>';
    print_r( $_GET );
echo '</pre>';

// -- Afficher les informations de $_GET

// Si $_GET n'est pas vide...
if( !empty( $_GET ) ) {

    // Je peux lire son contenu grâce a $_GET[ 'cle' ]
    echo 'ID : ' . $_GET['id'] . '<br>';
    echo 'Titre : ' . $_GET['titre'] . '<br>';
    echo 'Date : ' . $_GET['date'] . '<br>';

}
