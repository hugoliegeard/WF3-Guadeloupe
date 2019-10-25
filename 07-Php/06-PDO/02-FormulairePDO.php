<?php

    /*
        Inclusion de la connexion à ma BDD.
        ------------------------------------
        Grâce au require_once, ma variable $db
        est maintenant disponible dans cette page.
        Je peux donc utiliser $db pour accéder à
        ma base de données.
    */
    require_once 'config/database.php';

    /*
        OBJECTIF : Réaliser, Valider et Insérer les données
        d'un formulaire.

        CONSIGNE :
            1. Créer une BDD 'contact' permettant de stocker
            les informations d'un formulaire :
                - id
                - email
                - sujet
                - message

            2. Créer un formulaire bootstrap permettant la saisie
            de ces champs.

            3. A la soumission du formulaire, vérifiez les données :
                - Tous les champs sont obligatoire ;
                - Vérifier le format du champ 'email' ;
                - Le 'message' doit avoir 15 caractères minimum.

             4. Insérer les données vérifiées dans votre BDD. */

    
                 
             

        /*    BONUS : Afficher un message de confirmation / d'erreur
            à l'utilisateur grâce à une alerte bootstrap.
    */

    // Initialisation des variables
            $email = $sujet = $message = $content =null;
    
            //Si $_POST n'est pas vide et si le formulaire est soumis
             
            if(!empty($_POST)) {

                // Affectation des données POST dans des variables 
                foreach ($_POST as $cle => $valeur) {
                    $$cle=$valeur;
                } 
            
                // Déclaration du tableau vide
                $errors = [];
            
                // Vérification                
                if(empty($email)) {
                    $errors['email'] = "Vous avez oubliez l'email.";
                }

                // Vérification du format de l'email
                if ( !empty($email) && !filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

                    // Si mon email n'est pas vide, et que dans le même temps le format de mon email n'est pas correct, je rentre dans la condition.
                    $errors['email'] = "Vérifiez le format de votre email.";
                }
                
                if(empty($sujet)) {
                    $errors['sujet'] = "Vous avez oubliez le sujet.";
                }
            
                // Le message doit avoir 15 caractères minimum.
                // Vérification du message ( Supérieur a 15 caractères )

                if ( strlen( $message ) < 15 ) {
                    $errors['message'] = "Le message est trop court. 15 caractères minimum.";
                }
                   
                var_dump($errors);

                if (empty($errors)){
                    $content = '<div class="alert alert-success">Merci, votre message sur : <strong>' . $sujet . '</strong> a bien été envoyé ! </div>';
                     } else {
                       // Le tableau n'est pas vide. Il y a des erreurs.
                       $content = '<div class="alert alert-warning">Echec de la mission.</div>';
                                 }
    
                $query = $db->prepare('
                                 INSERT INTO `contact` ( `email`, `sujet`, `message`)
                                         VALUES ( :email, :sujet, :message );
                                     ');
                                 
                    $query->bindValue(':email', $email ,PDO::PARAM_STR);
                    $query->bindValue(':sujet', $sujet ,PDO::PARAM_STR);
                    $query->bindValue(':message', $message ,PDO::PARAM_STR);
                                 
                    $query->execute();
            }
            
                                 
    ?>



<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Formulaire PDO</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
       
    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="container">
                <div class="jumbotron"><h1>Formulaire PDO<h1></div>    
                <form method="post">
                <?= $content ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input 
                            type="text" 
                            class="form-control <?= isset($errors['email'])?'is-invalid': "" ?>" 
                            id="email" 
                            name="email"
                            placeholder="email@example.com">
                            <div class="invalid-feedback"> <?= isset($errors['email'])?$errors['email'] : "" ?></div>
                    </div>
                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <input 
                            type="text" 
                            class="form-control <?= isset($errors['sujet'])?'is-invalid': "" ?>" 
                            id="sujet" 
                            name="sujet" 
                            placeholder="Sujet...">
                            <div class="invalid-feedback"><?= isset($errors['sujet'])?$errors['sujet'] : "" ?></div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea 
                            class="form-control <?= isset($errors['message'])? 'is-invalid' : "" ?>" 
                            id="message" 
                            name="message" 
                            rows="4"
                            placeholder="Votre message..."></textarea>
                        <div class="invalid-feedback"><?= isset($errors['message'])?$errors['message'] : "" ?></div>
                    </div>
                    <button type="submit" class="btn btn-lg">Envoyer</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        h1 {text-align : center; color: #c286d1;}
        button {background-color:#c286d1 !important; color:white !important;}
        button:hover {background-color: #ffffff !important; border-color:#c286d1 !important; color:#c286d1 !important;}
    </style>
    </body>
    </html>

    


