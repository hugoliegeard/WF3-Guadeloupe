<?php
//Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');

// Vérification si auteur en ligne
$auteur =  isOnline(); 

if(!$auteur){
    // Auteur non connecté
    redirection('connexion.php'); // Redirection sur accueil ou creation page acces refuse.php
}

//$categories  =  getCategories();

// var_dump($id_auteur);
//var_dump($id_categorie);

$titre = $contenu = $image =$id_categorie = null;

if (!empty($_POST)){
     //Affectation des variables
    $titre      = $_POST['titre'];
    $contenu     = $_POST['contenu'];
    $image      = $_FILES['image']; // Je récupere un fichier avec la superglobale $_FILES
    $id_categorie   = $_POST['id_categorie'];
    $id_auteur     = $auteur['id'];
 
 


    // Traitement de l'upload
    $fileTmp = $image['tmp_name']; // emplacement temporaire de l'image

    // Récupération de l'extension de mon image
    $extension = pathinfo($image['name'])['extension'];

    // Je donne un nom à l'image
    $fileName = slugify($titre) . '.' .$extension;

    // Je définie l'endroit ou stocker mon fichier
    $destination = __DIR__ .'/assets/img/article/'.$fileName;
    // Je déplace du dossier temporaire vers le dossier projet
    move_uploaded_file($fileTmp, $destination);

    // J'envoi dans ma BDD le nom de l'image
    $image = $fileName;

     //Déclaration des erreurs
     $errors = [];

     /*------------------------VERIFICATION DATA ----------------------------------*/

     //Vérification titre
    if (empty($titre)){
        $errors['titre']="Veuillez saisir un titre";
     }
     
    if (!empty($titre) && strlen($titre) > 100){
        $errors['titre'] ='Votre titre  est trop long';
    } 
     
     //Vérification du contenu
    if (empty($contenu)){
        $errors['contenu'] ='Vous avez oublié le contenu..';
    } 

    if (!empty($contenu) && strlen($contenu) < 70){
        $errors['contenu'] ='Votre contenu est top court 70caractères min.<br>';
    } 

    
    
   
       

    // Action à faire si pas d'erreurs
    if (empty($errors)){

        /*------------------INSERTION DANS LA BD VIA LA FONCTION addArticle ----------------*/
    
        $idArticle = addArticle( $id_auteur, $id_categorie, $titre, $contenu, $image );
        var_dump($idArticle);
        if($idArticle){
          redirection('article.php?id_article=' . $idArticle);
        }
        
        $titre = $contenu = $image = null;
    }

}

?>

<!-- Contenu de la page -->

    <div class="container mx-auto">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <?php 
                /**
                 * On peut créer une div avant
                 * <?php if(!empty($errors)){ ?>
                 *    <div class="alert alert-danger">
                 *      <strong>Attention, vous devez vérifier vos champs</strong>
                 *      <?php foreach ($errors as $error){
                 *          <?= $error ?> <br>
                 *      <?php } ?>
                 *    </div>
                 * <?php } ?>
                 * 
                 */
                ?>
                <form method="POST"  enctype="multipart/form-data" class="m-3">
                    <fieldset class="border rounded p-3" >
                        <h2 class="text-center"> <?= $auteur['prenom']?> Crée ton article</h2>
                     
                        <!-- Titre -->
                        
                            <div class="form-group ">
                                <input type="text" name="titre" id="titre" value="<?= $titre?>" placeholder="Entrer un titre d'article..."
                                class="form-control <?= isset($errors['titre']) ? 'is-invalid' : '' ?>" >
                                <div class="invalid-feedback">
                                    <?= isset($errors['titre']) ? $errors['titre']:'' ?>
                                </div>
                            </div>
                        
                            <!-- Choisir une  catégorie-->
                    
                            <div class="form-group">
                                <select class="form-control" name="id_categorie" id="id_categorie">
                                    <?php foreach ($categories as $categorie) {?>
                                    <option <?= ($categorie['id'] == $id_categorie) ? 'selected' : '' ?>
                                    value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        
                        
                    
                            <!-- Contenu -->
                        
                            <div class="form-group ">
                                <textarea type="text" name="contenu" id="contenu" value="<?= $contenu?>"
                                class="form-control <?= isset($errors['contenu']) ? 'is-invalid' : '' ?>" placeholder="Votre contenu..."></textarea>
                                <script> CKEDITOR.replace( 'contenu' ); </script>
                                <div class="invalid-feedback">
                                    <?= isset($errors['contenu']) ? $errors['contenu']:'' ?>
                                </div>
                            </div>


                            <!-- Image-->
                    
                            <div class="form-group ">
                                <input type="file" name="image" id="imageUpload" value="<?= $image?>"
                                class="form-control-file <?= isset($errors['image']) ? 'is-invalid' : '' ?>" placeholder="Ajouter une image..">
                                <div class="invalid-feedback">
                                    <?= isset($errors['image']) ? $errors['image']:'' ?>
                                </div>
                                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .gif, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
                            </div>
                    
                        <!-- Bouton -->
                        <button type="submit" name="submit" class="btn btn-block btn-dark">Publier mon article</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>