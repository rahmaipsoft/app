



<?php
session_start();

include_once('./../config/cnx.php');
// include_once('./../config/user.php');
include_once('./../variables.php');

// Vérification du formulaire soumis
// if (
//     !isset($_POST['title']) || !isset($_POST['recipe'])
    
//     )
// {
// 	echo 'Il faut un titre et une recette pour soumettre le formulaire.';
//     return;
// }	



if ( empty($_POST['title']) ||empty($_POST['recipe'])) {
    echo"svp Il faut un titre et une recette pour soumettre le formulaire. ";
}
else{

  echo"bravo";




$title = $_POST['title'];
$recipe = $_POST['recipe'];

// Faire l'insertion en base
$insertRecipe = $mysqlClient->prepare('INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title' => $title,
    'recipe' => $recipe,
    'is_enabled' => 1,
    // $loggedUser a partir config=>users
    'author' => $loggedUser['email'],
]);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de recette</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <!-- MESSAGE DE SUCCES -->
   
    <!-- <?php include($rootUrl.'app/header.php'); ?> -->
    <?php include('./../header.php'); ?>
        <h1>Recette ajoutée avec succès !</h1>
        
        <div class="card">
            
            <div class="card-body">
                <h5 class="card-title"><?php echo $title ; ?></h5>
                <p class="card-text"><b>Email</b> : <?php echo $loggedUser['email']; ?></p>
                <p class="card-text"><b>Recette</b> : <?php echo strip_tags($recipe); ?></p>
            </div>
        </div>
    </div>
    <!-- <?php include_once($rootPath.'/footer.php'); ?> -->
    <?php include_once('./../footer.php'); ?>

    <?php  }?>
</body>
</html>
