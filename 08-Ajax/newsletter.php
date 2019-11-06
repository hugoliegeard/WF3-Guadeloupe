<?php

# Connexion à la BDD
$db = new PDO('mysql:host=localhost;dbname=newsletter', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

# On déclare que notre fichier va retourner du JSON
# Pas obligatoire, préférable.
header('Content-Type: application/json');

# Détecter la méthode POST
if ( !empty( $_POST ) ) {

    # Récupération des données POST
    $prenom = $_POST['prenom'];
    $nom    = $_POST['nom'];
    $email  = $_POST['email'];

    # Vérification des données soumises par l'utilisateur
    $errors = []; 

        # Vérification du mail
        if ( !empty( $email ) ) {

            # Vérification du format du mail
            if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) ) {

                # Mon email est valide
                # Vérification de l'existance de l'email dans la BDD
                $query = $db->prepare('
                    SELECT COUNT(id)
                        FROM inscription
                            WHERE email = :email
                ');
                $query->bindValue(':email', $email, PDO::PARAM_STR);
                $query->execute();

                # Si ma requète retourne 0, il n'y a pas d'email dans la base.
                $isEmailInDb = $query->fetchColumn(); # Retourne la valeur de la 1ère colonne
                if ($isEmailInDb) { # Si l'email existe dans la base
                    
                    # Dans cette condition, $isEmailInDb retourne 1. Soit true.
                    $errors['isEmailInDb'] = true;

                } else {

                    # Sinon, l'email n'est pas déjà présente dans la BDD.
                    # Insertion SQL.
                    $query = $db->prepare('
                        INSERT INTO inscription (prenom, nom, email)
                            VALUES (:prenom, :nom, :email)
                    ');
                    
                    $query->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                    $query->bindValue(':nom', $nom, PDO::PARAM_STR);
                    $query->bindValue(':email', $email, PDO::PARAM_STR);
                    $query->execute();

                } // if ($isEmailInDb) {}

            } else {

                # Le format de l'email est incorrect !
                $errors['isEmailInvalid'] = true;

            } // Fin filter_var( $email )

        } else {

            # Sinon, l'email est vide, je retourne une erreur
            $errors['isEmailEmpty'] = true;

        } // Fin !empty( $email )

    # Une fois notre traitement terminé, on va faire un retour a l'application.
    if ( empty($errors) ) {

        # Je retourne une réponse positive
        echo json_encode(['success' => true]);

    } else {

        # Sinon, il y a eu des erreurs, je retourne les erreurs
        echo json_encode([
            'success' => false,
            'errors'  => $errors
        ]);

    } // Fin if ( empty($errors) ) {}

} // if ( !empty( $_POST ) ) {}