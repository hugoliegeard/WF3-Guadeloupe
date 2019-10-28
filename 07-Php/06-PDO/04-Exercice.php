<?php

/*
    OBJECTIF : 
        Développer un système de newsletter.

    EXERCICE :

    I. Créer une base de donnée 'newsletter' permettant de stocker :
        - nomcomplet (prénom + nom) dans le même champ SQL ;
        - email

    II. Créer un Formulaire permettant la saisie de ces champs.

    III. Après vérification (uniquement l'email est obligatoire), 
    insérez les données saisies dans la base.

    IV. Afficher dans un tableau les inscrits

    V. BONUS : Mettez en place un système de désinscription.

*/

// Connexion a la BDD
try {
    $db = new PDO('mysql:host=localhost;dbname=newsletter', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// Initialisation des variables
$content = null;

// Récupération des inscrits 
$query = $db->query('SELECT * FROM inscription'); 
$contacts = $query->fetchAll();

// Vérification des données POST
if (!empty($_POST)) {
    
    // Récupération des données POST
    $email = $_POST['email'];
    $nomcomplet = $_POST['nomcomplet'];

    // Vérification des champs
    $errors = [];

    if (empty($email)){
    $errors['email'] = "Vous avez oublié votre email";}

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Veuillez vérifier le format de votre email";}

        //Si aucune erreur, insertion des données
    if (empty($errors)) {
        
        $query = $db->prepare('INSERT INTO `inscription` (`nomcomplet`, `email`)
        VALUES (:nomcomplet, :email);');
        $query->bindvalue(':nomcomplet', $nomcomplet, PDO::PARAM_STR);
        $query->bindvalue(':email', $email, PDO::PARAM_STR);
        $query->execute();

        // Affichage d'un message de succes.
        $content= '<div class="alert alert-success"> Vous êtes maintenant inscrit à notre newsletter </div>';
    
    }

} // if (!empty($_POST))

if (!empty($_GET)) {

    $email = $_GET['email'];
    $query = $db->prepare('DELETE from inscription WHERE email = :email');
    $query->bindValue(':email',$email, PDO::PARAM_STR);
        if ($query->execute()){
            $content= '<div class="alert alert-success">
                Vous ne faite plus parti(e) de notre liste.
            </div>';
        }

}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Newsletter</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-6 mx-auto mt-4">

                <?= $content ?>

                <form method="post">
                   
                    <!--Nom complet-->
                    <div class="form-group">
                        <label>Nom Complet</label>
                        <input type="text" id="nom" name="nomcomplet" class="form-control" placeholder="Saisissez votre nom complet">
                    </div>

                    <!--Email-->
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" id="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : ''?>" placeholder="email@exemple.com">
                        <div class="invalid-feedback">
                            <?= isset($errors['email']) ? $errors['email'] : ''?>
                        </div>
                    </div>

                    <!--Bouton de soumission-->
                    <button class="btn btn-dark btn-block">Envoyé votre demande</button>
                    
                </form>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Nom Complet</th>
                        <th scope="col">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($contacts as $contact){ ?>
                        <tr>
                            <th><?php echo $contact['nomcomplet'] ?></th>
                            <td><?php echo $contact['email'] ?></td>
                        </tr>  
                    <?php }//Fin du foreach ?>
                    </tbody>
                    </table>

                <div class="jumbotron mt-4">
                    <h1 class="display-4">Désinscription</h1>
                    <form method="get">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" 
                                placeholder="john.doe@email.com">
                        </div>
                        <button class="btn btn-danger btn-block">
                            Me désinscrire
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>