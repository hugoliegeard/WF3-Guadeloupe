<?php
//Inclusion du header sur la page
require_once(__DIR__ . '/partials/header.php');

$categories  =  getCategories();
$auteurs =  getAuteurs();


$titre = $contenu = $image =$categorie_id = $auteur_id = $content = null;

if (!empty($_POST)){
     //Affectation des variables
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
     //Déclaration des erreurs
     $errors = [];

     /*------------------------VERIFICATION DATA ----------------------------------*/

     //Vérification prenom
    if (empty($titre)){
        $errors['titre']="Veuillez saisir un titre";
     }
     
     //Vérification du contenu
    if (empty($contenu)){
        $errors['contenu'] ='Vous avez oublié le contenu..';
    } 

    //Vérification du message (Supérieur à 15)
    if (strlen($contenu) < 70){
        $errors['contenu'] ='Votre contenu est top court 70caractères min.<br>';
    } 

      //Vérification du contenu
      if (empty($image)){
        $errors['image'] ='Vous avez oublier d\'insérer l\'image.';
    }

     //Vérification de l'image
     if (empty($categorie_id )){
        $errors['categorie_id']= "Veuillez saisir une catégorie";
    }
    
    if (empty($auteur_id)){
        $errors['auteur_id']= "Veuillez saisir une catégorie";
    }
       

    // Action à faire si pas d'erreurs
    if (empty($errors)){

        /*------------------------INSERTION DANS LA BD  ----------------------------------*/
    
       $query = $db->prepare(' INSERT INTO `actunews` (`titre`, `contenu`, `categorie_id`,`auteur_id`,) 
       VALUES (:titre, :contenu, :categorie_id , :auteur_id )');
       $query->bindParam(':titre',$titre, PDO::PARAM_STR);
       $query->bindParam(':contenu',$contenu, PDO::PARAM_STR);
       $query->bindParam(':contenu',$categorie_id, PDO::PARAM_INT);
       $query->bindParam(':contenu',$auteur_id, PDO::PARAM_INT);   
       
       if ($query->execute()){
            $content ='
                <div class="alert alert-success">
                    <h3> Nous avons bien pris en compte votre demande</h3>
                    <p> Merci '.$prenom. ' ' .$nom. ' d\'avoir rempli ce formulaire <br>
                    Nous reviendrons vers vous dans les plus brefs délais<p>
                </div>
                
            ';
            //header('location: href="article.php?id_article=$article"');
        };
        
        //href="article.php?id_article=<?=$article['id']?
        
        $prenom = $nom = $email =$tel = $sujet = $message  = null;
    }else {
        $content ='
        <div class="alert alert-danger">
            <h3> Merci de vérifier vos informations... </h3>
        </div>
        ';
    }

}

?>

<!-- Contenu de la page -->

<div class="container mx-auto">
        <form method="POST"  class="m-3">
            <fieldset class="border rounded p-3" >
                <h2 class="text-center">Créer un article</h2>
                <?= $content ?>
                <!-- Titre -->
                
                    <div class="form-group ">
                        <input type="text" name="titre" id="titre" value="<?= $titre?>" placeholder="Entrer un titre d'article..."
                        class="form-control <?= isset($errors['titre']) ? 'is-invalid' : '' ?>" >
                        <div class="invalid-feedback">
                            <?= isset($errors['titre']) ? $errors['titre']:'' ?>
                        </div>
                    </div>
                
                    <!-- Contenu -->
                 
                    <div class="form-group ">
                        <textarea type="text" name="contenu" id="contenu" value="<?= $contenu?>"
                         class="form-control <?= isset($errors['contenu']) ? 'is-invalid' : '' ?>" placeholder="Votre contenu..."></textarea>
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
             
                <!-- Choisir une  catégorie-->
             
                    <div class="form-group">
                        <select name="categorie_id" id="catagorie_id">
                            <?php foreach ($categories as $categorie) {?>
                            <option value="<?= $categorie['id'] ?>"><?= $categorie['nom'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($errors['categorie_id']) ? $errors['categorie_id']:'' ?>
                        </div>
                    </div>
                  
                    <!-- Choisir un auteur-->                    
                    <div class="form-group">
                        <select name="auteur_id" id="auteur_id">
                            <?php foreach ($auteurs as $auteur) {?>
                            <option value="<?= $auteur['id'] ?>"><?= $auteur['prenom'].' '.$auteur['nom'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= isset($errors['auteur_id']) ? $errors['auteur_id']:'' ?>
                        </div>
                    </div>
        
                 
                <!-- Bouton -->
                <button type="submit" name="submit" class="btn btn-block btn-dark">Publier mon article</button>
            </fieldset>
        </form>
    </div>

<?php
//Inclusion du footer sur la page
require_once(__DIR__ . '/partials/footer.php');
?>