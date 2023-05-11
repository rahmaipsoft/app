



<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>

    <link href="dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100">
    <!-- <div class="container"> -->


    <!-- Navigation -->
    <?php include_once 'header.php';?>
      <img src="https://creer-un-site.com/wp-content/uploads/2015/08/theme-wordpress-culinier-recette.jpg" alt="">

    <?php include_once 'footer.php';?>
    <!-- </div> -->
    
  
   <?php
   $sth = $mysqlClient->prepare("SELECT * FROM recipes");
   $sth->execute();
   
   /* Fetch all of the remaining rows in the result set */
   
   $result = $sth->fetchAll();
//    print_r($result);
    foreach ($result as $key => $value) {  ?>
       
        <table class="table">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">recipe</th>
      <th scope="col">author</th>
      <th scope="col">is_enabled</th>
      <th scope="col">action</th>
     
    </tr>
  </thead>
  <tbody>
    <tr>
      <!-- <th scope="row">1</th> -->
      <td> <?php  echo"$value[title]" ?>  </td>
      <td>   <?php  echo"$value[recipe]" ?> </td>
      <td> <?php  echo"$value[author]" ?></td>
      <td> <?php  echo"$value[is_enabled]" ?></td>
      <td> <?php  echo"*****" ?></td>
     
    </tr>
    
    
  </tbody>
</table>

<?php  }?>
    





  


    <script src="dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>