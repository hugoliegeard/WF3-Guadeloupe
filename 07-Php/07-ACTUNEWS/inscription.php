<?php
//Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');

    $prenom  = $nom = $email = $password = $cfPassword= null;

    $errors =[];
    
    if (!empty($_POST)) {

         //Affectation des variables
         foreach ($_POST as $key => $value) {
            $$key = $value;
        }

        /*------------------------VERIFICATION DATA ----------------------------------*/

         //Vérification prenom
         if (empty($prenom)){
            $errors['prenom']="Veuillez saisir un prénom";
         }
         //Vérification nom
         if (empty($nom)){
            $errors['nom']="Veuillez saisir un nom";
         }
          //Vérification email
         if (empty($email)){
            $errors['email']="Veuillez entrer un email..";
         }
         if ( !empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'Vérifier le format votre email.<br>';
        }
         //Vérification password
         if (empty($password)){
            $errors['password']="Vous avez oublié le mot de passe";
         }
          //Vérification confirm password
          if ($password !== $cfPassword){
            $errors['password']="Les mots de passe ne correspondent pas";
         }

         if(empty($errors)){
             if( inscription($prenom, $nom, $email, $password)){
                 //redirection sur la page de conenxion
                 redirection('connexion.php?inscription=success&email='.$email);
             }
         }

    } // Fin du if $_POST


?>

<!-- Contenu de la page -->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Inscription</h1>
</div>

<div class="container mx-auto ">
    <div class="row ">
        <div class="col-md-6 offset-md-3 mx-auto" >
            <form method="post" class="form-horizontal ">
                <div class="form-group">
                    <input type="text" name="prenom" class="form-control <?= isset($errors['prenom']) ? 'is-invalid' : '' ?>" 
                    value="<?= $prenom?>" placeholder="Prénom.">
                    <div class="invalid-feedback">
                        <?= isset($errors['prenom']) ? $errors['prenom']:'' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="nom" class="form-control <?= isset($errors['nom']) ? 'is-invalid' : '' ?>" 
                    value="<?= $nom?>" placeholder="Nom.">
                    <div class="invalid-feedback">
                        <?= isset($errors['nom']) ? $errors['nom']:'' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                    value="<?= $email?>" placeholder="Email.">
                    <div class="invalid-feedback">
                        <?= isset($errors['email']) ? $errors['email']:'' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?> " 
                    placeholder="Mot de passe.">
                    <div class="invalid-feedback">
                        <?= isset($errors['password']) ? $errors['password']:'' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="cfPassword" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                     placeholder="Confirmer le Mot de passe.">
                </div>
                <button class="btn btn-block btn-dark">M'inscrire</button>
            </form>
        </div>
    </div>
</div>



<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>

