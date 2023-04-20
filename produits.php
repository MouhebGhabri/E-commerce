<?php
include 'inc/func.php';
$categories = getCategory();

//getting the passsed id
if (isset($_GET['id_p'])) {
  $produit =  getProduitsById($_GET['id_p']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Com</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</html>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">My Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item category">
            <a class="nav-link category-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu">
              <?php 
              foreach($categories as $categorie){
                print '<li><a class="dropdown-item" href="#">'.$categorie['nom_c'].'</a></li>';
              }
              ?>
              </ul>
              <?php  if(isset($_SESSION['username'])){
                print '
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
              </li>
              ';
              }
              ?>

        </ul>
        <form class="d-flex"  action="index.php" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <?php 
          if(isset($_SESSION['username'])){
            print '         <a href="Logout.php" class="btn btn-primary">Logout</a>';
          }
        ?>
      </div>
    </div>
  </nav>
<div class="row col-12 mt-3 mb-3" ;>
    <div class="card col-8 offset-2">
      <img src="imgs/<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $produit['nom'] ?></h5>
        <p class="card-text"><?php echo $produit['description'] ?></p>
        <li class="list-group-item"><?php echo $produit['prix'] ?> dt</li>

      </div>
      <ul class="list-group list-group-flush">
        <?php
        foreach ($categories as $index => $c) {
          if ($c['id_c'] == $produit['categorie']) {

            print '<button class="btn btn-success mb-2">' . $c['nom_c'] . '</button>
                  ';
          }
        }
        ?>
      </ul>
      <div class="col-12 m-2">
      <form class="d-flex" action="act/order.php" method="post">
        <input type="hidden" name="id_p" value="<?php echo $produit['id_p']; ?>">
        <input type="number" class="form-control" name="quantite" required step="1">
        <button type="submit" class="btn btn-success">Order</button>
      </form>
    </div>
    </div>
    <div>
    </div>
  </div>
  <?php include('inc/footer.php'); ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</html>