<?php
session_start();
if (!isset($_SESSION['nom'])) {
  header('location:../LoginA.php');
}
include "../../connect.php";
function getCategory()
{
  include '../../connect.php';
  // sql query
  $sqlQ = "SELECT * FROM `categories`";
  //exec
  $result = $conn->query($sqlQ);
  //Display
  $categories = $result->fetchAll();
  //check : var_dump($categories);
  return $categories;
}
$categories = GetCategory();
function getProducts()
{


  include '../../connect.php';
  // sql query
  $sqlQ = "SELECT * FROM `produits`";

  //exec
  $result = $conn->query($sqlQ);

  //Display

  $produits = $result->fetchAll();

  //check : var_dump($categories);

  return $produits;
}
$product = getProducts();

function getStock(){
  
  include '../../connect.php';
  // sql query
  $sqlQ = "SELECT id_s,id_p,nom,id_s,produit,quantite FROM `stock`,`produits` WHERE stock.produit=produits.id_p";

  //exec
  $result = $conn->query($sqlQ);

  //Display

  $stock = $result->fetchAll();
  return $stock;
}
$stock=getStock();

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

  <title>Admin Space</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../css/dashboard.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../LogoutA.php">Log out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <?php include '../template/navA.php'; ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Product stock list</h1>

          <!-- <div>
            <a data-toggle="modal" data-target="#exampleModal" class="text-primary" style="text-decoration:underline;">Add</a>
          </div> -->
        </div>
        <!-- check if cat is added modified duplication deleted -->
        <?php
        if (isset($_GET['modified']) && $_GET['modified'] == "ok") {
          echo print '<div class="alert alert-success" >modified successfully</div>';
        }
        ?>
        <?php
        if (isset($_GET['err']) && $_GET['err'] == "dup") {
          echo print '<div class="alert alert-danger">Product not added or modified because of duplicated data</div>';
        }
        ?>


        <!-- table -->
        <!-- <div> -->
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Quantite</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            <?php
            
            $i = 0;
            foreach ($stock as $st) {
              $i++;
              echo print ' 
                      <th scope="row">' . $i . '</th>
                      <td>'.$st['nom'].'</td>
                      <td>' . $st['quantite'] . '</td>
                      <td>' . $st['produit'] . '</td>
                      <td>
                        <a data-toggle="modal" data-target="#modifyModal' . $st['id_s'] . '" class="btn btn-success">Modify</a>
                      </td>
                    </tr>
                 <tr>
                ';
            }
            ?>
          </tbody>
        </table>
    </div>
    </main>
  </div>
  </div>
  <?php

  foreach ($stock as $index => $stM) { ?>
    <!-- Modal  Modify-->
    <div class="modal fade" id="modifyModal<?php echo $stM['id_s'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modifyModal">Update quantite</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="modifyS.php">
              <div class="form-group">
                <input type="hidden" value="<?php echo $stM['id_s']; ?>" name="id_s" required>
                <p>Quantite of the product : <?php echo $stM['nom']; ?></p>
                <input type="number" class="form-control" name="quantite" value="<?php echo $stM['quantite'] ?>" required placeholder="product Qtte">
                <br>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Modify</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  <?php
  }

  ?>


  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../../js/vendor/popper.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

  <!-- Graphs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
  <script>
    function popUpDeleteConfirm() {
      return confirm("do you want to confim your action");
    }
  </script>

</body>

</html>