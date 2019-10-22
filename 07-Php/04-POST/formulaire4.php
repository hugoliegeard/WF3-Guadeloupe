    <!-- 
        1. A l'aide de bootstrap, créez un formulaire, permettant de déposer une annonce. Vous utiliserez les champs suivants :
            -- Un champ select : Choisissez une catégorie
            -- Un champ radio : Type d'annonce : Offres / Demandes
            -- un champ texte : Titre de l'annonce
            -- un champ textarea : Texte de l'annonce
            -- un champ texte : Prix de l'annonce
        
        2. A la soumission du formulaire, vous vérifierez les données transmisent par l'utilisateur.

        3. Si elles sont correctes, vous afficherez un récapitulatif sur la page.
     -->    

     <?php

        // 1. On s'assure de récupérer toutes les valeurs
        // print_r( $_POST );

        // 2. Initialiser les variables
        $categorie = $titre = $annonce = $prix = $content = null;
        $type = 'offres';

        // 3. Si $_POST n'est pas vide...
        if(!empty($_POST)) { //    /!\ ETAPE IMPORTANTE /!\
            
            // 4. Affectation des variables
            // $categorie  = $_POST['categorie'];
            // $titre      = $_POST['titre'];
            // $annonce    = $_POST['annonce'];
            // $prix       = $_POST['prix'];
            // $type       = $_POST['type'];

            /*
                Au lieu de faire une affectation manuel,
                vous pouvez automatiser la création des variables
                --------------------------------------------------
                Création dynamique des variables en PHP. { BONUS }
                https://www.php.net/manual/fr/language.variables.variable.php
            */

            foreach ($_POST as $cle => $valeur) {
                $$cle = $valeur;
            }
            
            // var_dump( $categorie );
            // var_dump( $titre );
            // var_dump( $annonce );
            // var_dump( $prix );
            // var_dump( $type );

            // 5. Création du tableau d'erreurs et début des vérifications
            $errors = [];

            if(empty($categorie)) {
                $errors['categorie'] = "Vous avez oubliez de choisir une catégorie.";
            }

            if(empty($type)) {
                $errors['type'] = "Vous avez oubliez de choisir un type.";
            }

            if(empty($titre)) {
                $errors['titre'] = "Vous avez oubliez le titre de votre annonce.";
            }

            if(strlen($annonce) < 50) {
                $errors['annonce'] = "Votre annonce est trop courte. 50 caractères minimum.";
            }

            if(empty($prix)) {
                $errors['prix'] = "Vous avez oubliez le prix de votre annonce.";
            }

            if(!empty($prix) && !filter_var($prix, FILTER_VALIDATE_FLOAT)) {
                $errors['prix'] = "Vérifiez le format de votre prix.";
            }

            // echo '<pre>';
            // print_r( $errors );
            // echo '</pre>';

            // 6. Après les vérifications, je vérifies s'il y a des erreurs
            if(empty($errors)) {

                // Dans cette condition, le tableau est vide. Pas d'erreurs
                $content = '
                    <div class="alert alert-success">
                        Merci, votre annonce : <strong>' . $titre . ' </strong>
                        a bien été publié !
                    </div>
                ';

                // -- On réinitialise les valeurs
                $categorie = $titre = $annonce = $prix = null; $type = 'offres';

            } else {

                // Le tableau n'est pas vide. Il y a des erreurs.
                $content = '
                    <div class="alert alert-danger">
                        Attention, veuillez bien remplir vos champs.
                    </div>
                ';

            } // if(empty($errors))

        } // if(!empty($_POST))

     ?>

     <!DOCTYPE html>
     <html lang="fr">
     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <title>Déposer une annonce</title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     </head>
     <body>
        
        <div class="container">
            <div class="row">
                <div class="col-8 mx-auto">

                    <h3 class="text-center m-3">
                        Déposer une annonce
                    </h3>

                    <?= $content ?>

                    <form method="post">

                        <!-- ----------------------- Catégorie ----------------------- -->
                        
                        <div class="form-group">
                            <select name="categorie" id="categorie"
                                class="form-control <?= isset($errors['categorie']) ? 'is-invalid' : '' ?>">
                                <option value="0">
                                    -- Choisissez votre catégorie --
                                </option>
                                <option <?= $categorie == 'logement' ? 'selected' : '' ?> value="logement">Logement</option>
                                <option <?= $categorie == 'vehicules' ? 'selected' : '' ?> value="vehicules">Véhicules</option>
                                <option <?= $categorie == 'mobilier' ? 'selected' : '' ?> value="mobilier">Mobilier</option>
                                <option <?= $categorie == 'animaux' ? 'selected' : '' ?> value="animaux">Animaux</option>
                                <option <?= $categorie == 'electromenager' ? 'selected' : '' ?> value="electromenager">Electroménager</option>
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errors['categorie']) ? $errors['categorie'] : '' ?>
                            </div>
                        </div>

                        <!-- ----------------------- Offres / Demandes ----------------------- -->
                        
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input <?= $type == 'offres' ? 'checked' : '' ?>
                                    class="form-check-input" type="radio" 
                                    name="type" id="offres" value="offres">
                                <label class="form-check-label" for="offres">Offres</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input <?= $type == 'demandes' ? 'checked' : '' ?> 
                                    class="form-check-input" type="radio" 
                                    name="type" id="demandes" value="demandes">
                                <label class="form-check-label" for="demandes">Demandes</label>
                            </div>
                        </div>

                        <!-- ----------------------- Titre ----------------------- -->
                        
                        <div class="form-group">
                            <input type="text" class="form-control <?= isset($errors['titre']) ? 'is-invalid' : '' ?>"
                                value="<?= $titre ?>" name="titre" placeholder="Titre de l'annonce...">
                                <div class="invalid-feedback">
                                <?= isset($errors['titre']) ? $errors['titre'] : '' ?>
                            </div>
                        </div>

                        <!-- ----------------------- Description ----------------------- -->
                        
                        <div class="form-group">
                            <textarea name="annonce" id="annonce"
                                class="form-control <?= isset($errors['annonce']) ? 'is-invalid' : '' ?>"
                                placeholder="Texte de l'annonce..."><?= $annonce ?></textarea>
                                <div class="invalid-feedback">
                                    <?= isset($errors['annonce']) ? $errors['annonce'] : '' ?>
                                </div>
                        </div>

                        <!-- ----------------------- Prix ----------------------- -->
                        
                        <div class="input-group mb-3">
                            <input type="text" name="prix"
                                value="<?= $prix ?>" class="form-control <?= isset($errors['prix']) ? 'is-invalid' : '' ?>" 
                                placeholder="Prix de l'annonce... Ex : 5.50">
                            <div class="input-group-append">
                                <span class="input-group-text">&euro;</span>
                            </div>
                            <div class="invalid-feedback">
                                <?= isset($errors['prix']) ? $errors['prix'] : '' ?>
                            </div>
                        </div>

                        <!-- ----------------------- Bouton ----------------------- -->
                        
                        <button class="btn btn-block btn-secondary">
                            Valider
                        </button>

                    </form>

                </div> <!-- /.col-8 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->

     </body>
     </html>