<?php
    
    // print_r( $_POST );

    // On initialise les variables a null;
    // Elles sont null car l'utilisateur n'a pas encore soumis de données.
    $email = $sujet = $message = null;

    if ( !empty( $_POST ) ) { // Si $_POST n'est pas vide.

        // Récupération des données POST
        $email      = $_POST['email'];
        $sujet      = $_POST['sujet'];
        $message    = $_POST['message'];

        // Je déclare un tableau d'erreurs vide.
        $errors = [];

        // Vérification de l'email
        if ( empty( $email ) ) {
            $errors['email'] = "Vous avez oubliez votre email.";
        }

        // Vérification du format de l'email
        if ( !empty($email) && !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {
            // Si mon $email n'est pas vide, et que dans le même temps le format de mon email n'est pas correct, je rentre dans la condition.
            $errors['email'] = "Vérifiez le format de votre email.";
        }

        // Vérification du sujet ( N'est pas vide )
        if ( empty( $sujet ) ) {
            $errors['sujet'] = "Vous avez oubliez votre sujet.";
        }

        // Vérification du message ( Supérieur a 15 caractères )
        if ( strlen( $message ) < 15 ) {
            $errors['message'] = "Le message est trop court. 15 caractères minimum.";
        }

        // Aperçu de $errors
        // print_r( $errors );

        if ( empty($errors) ) {
            // Si mon tableau d'erreurs après toutes les vérifications est vide... Alors il n'y a pas eu d'erreurs et je peux procéder a la suite de mon traitement... Sauvegarde en BDD, Envoi de mail...
        }


    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Formulaire 3</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-sm-6 offset-sm-3">
        <h1>Formulaire de Contact</h1>
        <form method="post">

            <!-- Champ Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" 
                class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                id="email" name="email"
                value="<?= $email ?>"
                placeholder="jennydoe@example.com">
                <div class="invalid-feedback">
                    <?= isset($errors['email']) ? $errors['email'] : '' ?>
                </div>
            </div>

            <!-- Champ Sujet -->
            <div class="form-group">
                <label for="sujet">Sujet</label>
                <input type="text"
                    value="<?= $sujet ?>"
                    class="form-control  <?= isset($errors['sujet']) ? 'is-invalid' : '' ?>"
                    id="sujet" name="sujet" placeholder="Saisissez un sujet...">
                <div class="invalid-feedback">
                    <?= isset($errors['sujet']) ? $errors['sujet'] : '' ?>
                </div>
            </div>

            <!-- Champ Message -->
            <div class="form-group">
                <label for="message">Message</label>
                <textarea 
                placeholder="Saisissez un message"
                class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>" id="message" name="message" rows="3"><?= $message ?></textarea>
                <div class="invalid-feedback">
                    <?= isset($errors['message']) ? $errors['message'] : '' ?>
                </div>
            </div>

            <!-- Bouton Submit -->
            <div>
                <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>