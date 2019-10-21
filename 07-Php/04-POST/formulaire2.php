<!-- 
    1. Créer un formulaire avec les champs suivants :
        - prenom
        - nom
        - email
        - password

    2. Afficher à l'aide de $_POST les informations
        sur la page.
 -->
 <?php
    //print_r( $_POST );
    if(!empty($_POST)) {
        echo '<br>prenom : ' . $_POST['prenom'] . '<br>';
        echo 'nom : ' . $_POST['nom'] . '<br>';
        echo 'email : ' . $_POST['email'] . '<br>';
        echo 'password : ' . $_POST['password'] . '<br>';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire PHP</title>
</head>
<body>
    <h1>Formulaire 2</h1>

    <form method="post" action="formulaire2.php">

        <!-- Prénom -->
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom"
            placeholder="Saisissez votre prénom"> <br>

        <!-- Nom -->
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom"
            placeholder="Saisissez votre nom"> <br>

        <!-- Email -->
        <label for="email">Email</label>
        <input type="email" id="email" name="email"
            placeholder="Saisissez votre email"> <br>

        <!-- Password -->
        <label for="password">Password</label>
        <input type="password" id="password" name="password"
            placeholder="Saisissez votre password"> <br>

        <input type="submit" value="Envoyer mes informations">
    </form>
</body>
</html>