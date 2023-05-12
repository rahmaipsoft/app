

<?php    echo"post delete"; ?>



<?php
session_start();

include_once('./../config/cnx.php');
// include_once('./../config/user.php');
include_once('./../variables.php');

if(empty($_POST['id'])&&!isset($_POST['id']))
{
	echo 'Il faut un identifiant valide pour supprimer une recette.';
    // return;
}
else{
    $id = $_POST['id'];

    $deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id =:id');
    $deleteRecipeStatement->execute([
        'id' => $id,
    ]);
    
    header('Location: '.$rootUrl.'app/home.php');
}
// else{
//     $id = $_POST['id'];

//     $deleteRecipeStatement = $mysqlClient->prepare('DELETE FROM recipes WHERE recipe_id = :id');
//     $deleteRecipeStatement->execute([
//         'id' => $id,
//     ]);
    
//     header('Location: '.$rootUrl.'app/home.php');
// }


?>
