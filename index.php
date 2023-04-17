<?php
session_start();
  include 'inc/func.php';
  $categories=getCategory();

  if (!empty($_POST)){ //checking search btn
  
    $produits  = searchProduits($_POST['search']);
  }else{
    $produits = getProducts();
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

<?php  include 'inc/navbar.php'   ?>

  <div class="row col-12 mt-3 mb-3";>
    <?php 
      foreach($produits as $produit ){
        //passing the id "produits.php?id_p ...
        print '
        <div class="col-3 mt-2 mb-1" >
          <div class="card" style="width: 18rem;">
            <img src="imgs/'.$produit['image'].'" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">'.$produit['nom'].'</h5>
              <p class="card-text">'.$produit['description'].'</p>
              <a href="produits.php?id_p='.$produit['id_p'].'" class="btn btn-primary">Show</a> 
            </div>
          </div>
        </div>';
      }
    ?>
        </div>
        
<?php  include('inc/footer.php');?>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
</html>