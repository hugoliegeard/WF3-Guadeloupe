<?php
    print_r( $_POST );
    if(!empty($_POST)) {
        echo '<br>prenom : ' . $_POST['prenom'] . '<br>';
        echo 'nom : ' . $_POST['nom'] . '<br>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire PHP</title>
</head>
<body>
    <h1>Formulaire</h1>
    <!--
        Créer un formulaire HTML avec deux champs :
            prenom et nom + submit.
    -->
    <form method="post" action="formulaire1.php">

        <!-- 
            method : Permet de préciser quelle méthode POST | GET doit être
            utilisé par le navigateur pour transmettre les données saisies
            par l'utilisateur vers la page "action".

            action : Cet attribut permet de renseigner le script / la page
            vers laquelle l'utilisateur sera redirigé lors de l'envoi du 
            formulaire. Cette page va recevoir l'ensemble des données saisies
            par mon utilisateur.
         -->

        <!-- Prénom -->
        <label for="prenom">Prénom</label>
        <!-- 
            NE PAS OUBLIER LA PROPRIETE "name".
            Elle nous permettra de récupérer la
            saisie de l'utilisateur dans $_POST
         -->
        <input type="text" id="prenom" name="prenom"
            placeholder="Saisissez votre prénom"> <br>

        <!-- Nom -->
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom"
            placeholder="Saisissez votre nom"> <br>

        <input type="submit" value="Envoyer mes informations">
    </form>
</body>
</html>