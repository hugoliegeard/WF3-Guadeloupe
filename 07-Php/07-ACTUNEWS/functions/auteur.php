<?php
    
    //------ Fonctions pour gérer les auteurs (membres) ------------------//
    
    /**
     *  - Vérifier l'existence d'un nombre dans la base
     *  - Inscrire un membre
     *  - Connecter un membre
     *  - Déconnexion
     */
    
    
    //--- Permettre l'inscrption d'un membre dans la BDD
    // Retourne true ou 1 si insertion correcte ou false(0)

    function inscription($prenom, $nom, $email, $password){
        global $db;
        $query = $db->prepare('INSERT INTO auteur(prenom,nom, email, password) VALUES (:prenom,:nom, :email, :password)');
        $query->bindValue('prenom',$prenom, PDO::PARAM_STR);
        $query->bindValue('nom',$nom, PDO::PARAM_STR);
        $query->bindValue('email',$email, PDO::PARAM_STR);
        $query->bindValue('password',password_hash($password, PASSWORD_DEFAULT) , PDO::PARAM_STR);
        return $query->execute();
    }
    

    /** Permettre la connexion d'un user.
     *  Le stockage  de ses info en session
     *  Retourne true ou 1 si insertion correcte ou false(0)
     */ 
    function login($email,$password){
        global $db;
        $sql = 'SELECT * FROM auteur WHERE email = :email';
        $query = $db->prepare($sql);
        $query->bindValue(':email',$email, PDO::PARAM_STR);
        $query->execute();

        // Récupération de l'auteur dans la base
        $auteur=$query->fetch();
        // On vérifie si un auteur a été trouvé et que dans le même temps le mot de passe saisie par le user
        // dans le formulaire correspond au mot de passe de 'auteur trouvé dans la BDD
        if ($auteur && password_verify($password,$auteur['password'])){

            // Mettre en session les informations de l'auteur
            $_SESSION['auteur'] = $auteur; //Je stocke dans ma session PHP à la clé auteur, mon tableau associatif $auteur.
            return true;
        }
        return false;
    }



    function deconnexion() {
        unset($_SESSION['auteur']);
        return true;
    }
    
    
    // Récupération de tous les auteurs de la BDD 
    function getAuteurs() {
        global $db; 
        $query = $db->query('SELECT * FROM auteur');
        return $query->fetchAll(); // 
    }
    



?>