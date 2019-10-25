<?php
/*
    OBJECTIF : Afficher dans un tableau HTML <table>, <tr>, <td>
    les demandes de contacts reçu depuis le formulaire 02.

    CONSIGNE : 
    1. Récupérer les demandes de contacts depuis la base de données.
    2. Afficher dans un tableau HTML à l'aide d'une boucle les demandes reçus.
    3. BONUS : Ajouter un bouton permettant de supprimer un message.

    -----------------------------------------------------
    |   ID   |  EMAIL  |  SUJET  |  MESSAGE  |  ACTION  |
    -----------------------------------------------------
    |   1    | ..@x.xx | deman...| un mess...|    X     |
    |   2    | ..@x.xx | deman...| un mess...|    X     |
    |   3    | ..@x.xx | deman...| un mess...|    X     |

*/

// Inclusion de la configuration de la base de donnée.
require_once "config/database.php";

// Récupération des données de la table contact.
$query = $db->query('SELECT * FROM contact'); 

$contacts = $query->fetchAll();


if (isset($_GET['supprimer'])){
    $id= $_GET['supprimer'];
    $delete=$db->prepare('DELETE from contact WHERE id_contact = :id_contact');
    $delete->bindValue(':id_contact',$id, PDO::PARAM_INT);
        if ($delete->execute()){
            header('location: ./03-contact.php');
        }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Sujet</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($contacts as $contact){ ?>
   <tr>
      <th scope="row"><?php echo $contact['id_contact'] ?></th>
      <td><?php echo $contact['email'] ?></td>
      <td><?php echo $contact['sujet'] ?></td>
      <td><?php echo $contact['message'] ?></td>
      <td><a class="btn btn-danger" href="03-contact.php?supprimer= <?= $contact['id_contact'] ?> ">Supprimer</a></td>

    </tr>  
  <?php }//Fin du foreach ?>
  </tbody>
</table>
</div>
</div>
    </div>
</body>
</html>