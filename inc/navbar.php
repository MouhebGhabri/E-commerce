<?php
  include_once ("inc/func.php");
  $categories=  getCategory();
  


?>



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
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="cart.php">Cart'.$_SESSION['cart'].'</a>
                </li>
              ';
              }else{
                print ' 
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Login.php">Log in</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="Signup.php">Sign up</a>
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