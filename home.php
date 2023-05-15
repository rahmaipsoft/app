
<?php
// include_once('./variables.php');
?>

<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>

    <link href="dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <style>
  table, th, td {
  border:1px solid black!important;

  }

  .marginbtn{
    margin-left: 20px;
  }

  .table{
    margin-top: 30px;
  }

  </style>

</head>
<body class="d-flex flex-column min-vh-100 container-fluid ">
    <!-- <div class="container"> -->


    <!-- Navigation -->
    <?php include_once 'header.php';?>
      <!-- <img src="https://creer-un-site.com/wp-content/uploads/2015/08/theme-wordpress-culinier-recette.jpg" alt=""> -->


      <!-- carousel -->
      <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://creer-un-site.com/wp-content/uploads/2015/08/theme-wordpress-culinier-recette.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i0.wp.com/blogpascher.com/wp-content/uploads/2022/08/Soledad-meilleurs-themes-WordPress-de-recettes-de-cuisine.png?resize=800%2C411&ssl=1" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://i0.wp.com/blogpascher.com/wp-content/uploads/2018/01/STEAM-themes-wordpress-creer-site-internet-restaurant-caf%C3%A9-resto-pizzeria.jpeg?resize=800%2C411&ssl=1" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


    <!-- </div> -->
   <?php
$sth = $mysqlClient->prepare("SELECT * FROM recipes");
$sth->execute();

/* Fetch all of the remaining rows in the result set */

$result = $sth->fetchAll();
//    print_r($result);
?>



  <table class="table" >
  <thead>
    <tr>
    <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">recipe</th>
      <th scope="col">author</th>
      <th scope="col">is_enabled</th>
      <th scope="col">  action  </th>

    </tr>
  </thead>
  <?php foreach ($result as $key => $value) {?>
  <tbody>

    <tr>
      <!-- <th scope="row">1</th> -->
      <td> <?php echo "$value[recipe_id]" ?>  </td>
      <td> <?php echo "$value[title]" ?>  </td>
      <td>   <?php echo "$value[recipe]" ?> </td>
      <td> <?php echo "$value[author]" ?></td>
      <td> <?php echo "$value[is_enabled]" ?></td>

      <!-- <td> <div >   <a href="<?php echo ($rootUrl) . 'app/recipes/delete.php?id=' . ("$value[recipe_id]"); ?>"> <?php echo '<i class="fa-solid fa-trash-can"></i>' ?></a> </div>
      <div>  <?php echo '<i class="fa-sharp fa-regular fa-pen-to-square"></i>' ?></div> -->

      <td>
      <ul class="list-group list-group-horizontal">

        <li class="list-group-item"><a class="link-danger" href="./../app/recipes/delete.php?id=<?php echo ($value['recipe_id']); ?>">Supprimer l'article <i class="fa-solid fa-trash-can"></i></a></li>
        <li class="list-group-item marginbtn"><a class="link-warning" href="./../app/recipes/update.php?id=<?php echo ($value['recipe_id']); ?>">Editer l'article <i class="fa-sharp fa-regular fa-pen-to-square"></i></a></li>


      </ul>
      </td>





    </tr>


  </tbody>
  <?php }?>
</table>


<?php include_once 'footer.php';?>

  <!-- integration fontawesome -->
  <script src="https://kit.fontawesome.com/13a9e721bb.js" crossorigin="anonymous"></script>
       <!-- integration booststrap -->
    <script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>