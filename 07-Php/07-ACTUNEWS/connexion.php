<?php
//Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');

 $email = $password =  null;

    $errors =[];
    
    if (!empty($_POST)) {
         //Affectation des variables
         foreach ($_POST as $key => $value) {
            $$key = $value;
        }

         //Vérification email
         if (empty($email)){
            $errors['email']="Veuillez entrer un email..";
         }
        
         //Vérification password
         if (empty($password)){
            $errors['password']="Vous avez oublié le mot de passe";
         }
        
       

         if(empty($errors)){

            // Début du processus de connexion
            if (login($email, $password)){
                //User connecté fonction a retourné vrai
               redirection('mes-articles.php');
            }else{
                $errors['email'] = "Email/ Mot de passe incorrect";
            }
             

         }


    }

?>

<!-- Contenu de la page -->

<div class="p-3 mx-auto text-center">
    <h1 class="display-4">Connexion</h1>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6 offet-md-3 mx-auto">
            <?php  if(isset($_GET['inscription'])) {?>
                <div class="alert alert-success">
                    Félicitation, vous pouvez vous connecter.
                </div>
            <?php } ?>
            <form method="post" class="form-horizontal">
                <div class="form-group">
                    <input type="email" name="email" class="form-control  <?= isset($errors['email']) ? 'is-invalid' : '' ?>" 
                    value="<?= $email ?? $_GET['email'] ?? '' ?>" placeholder="Email.">
                    <div class="invalid-feedback">
                        <?= isset($errors['email']) ? $errors['email']:'' ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>" 
                    placeholder="Mot de passe.">
                    <div class="invalid-feedback">
                        <?= isset($errors['password']) ? $errors['password']:'' ?>
                    </div>
                </div>
                <button class="btn btn-block btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</div>



<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>
