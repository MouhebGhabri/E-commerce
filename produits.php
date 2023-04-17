<?php
include 'inc/func.php';
$categories = getCategory();

//getting the passsed id
if(isset($_GET['id_p'])){
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

  <?php include 'inc/navbar.php'   ?>

  <div class="row col-12 mt-3 mb-3" ;>
    <div class="card col-8 offset-2">
      <img src="imgs/<?php echo $produit['image'];?>"  class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?php echo $produit['nom']?></h5>
        <p class="card-text"><?php echo $produit['description']?></p>
        <li class="list-group-item"><?php echo $produit['prix']?> dt</li>

      </div>
      <ul class="list-group list-group-flush">
        <?php 
          foreach($categories as $index => $c){
                if($c['id_c']==$produit['categorie']){

                  print'<button class="btn btn-success mb-2">'.$c['nom_c'].'</button>
                  ';
                }
          }
        ?>
      </ul>
      
  </div>
  <div>
    <!-- <form ation="">
      <input type="hidden" value="<?php echo $produit['id_p']?>" name="produit">
      <input type="number" name="quantite" class="form-control" step="1">
      <button class="btn btn-primary">add to cart</button>  
  </form> -->
  </div>


  </div>
  <?php  include('inc/footer.php');?>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</html>