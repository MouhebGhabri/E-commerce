<?php
session_start();
if (!isset($_SESSION['nom'])) {
  header('location:../LoginA.php');
}
include "../../connect.php";

//cart state change
function changeEtat($data){
  include "../../connect.php";
  $sqlQ="UPDATE `panier` SET etat=".$data['etat']." WHERE id_pa=".$data['id_pa']."";
  $result=exec($sqlQ);

}
if(isset($_POST['btnSubmit'])){
    changeEtat($_POST);
}

// function getOrders(){
//   include '../../connect.php';
//   $result =$conn->query($sqlQ);
//   $orders=$result->fetchAll();
//   return $orders;
// }
// $orders=getOrders();

function getCart(){
  include '../../connect.php';
  $sqlQ="SELECT p.id_pa,u.username, u.phone, p.total, p.date_creation, po.nom,p.etat   FROM panier p, user u,commande c,produits po WHERE p.user=u.id";
  $result =$conn->query($sqlQ);
  $paniers=$result->fetchAll();
  return $paniers;
}
$paniers=getCart();

function getAllOrders(){
  include '../../connect.php';
  $sqlQ="SELECT p.nom, p.image, c.quantite, c.total, c.panier FROM commande c,produits p WHERE c.produit=p.id_p ORDER BY p.nom DESC LIMIT 5";
  $result =$conn->query($sqlQ);
  $ordersALL=$result->fetchAll();
  return $ordersALL;
}
$ordersALL=getAllOrders();
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
          <h1 class="h2">Cart list</h1>
        </div>
        <!-- check if cat is added modified duplication deleted -->
        <?php
        if (isset($_GET['added']) && $_GET['added'] == "ok") {
          echo print '<div class="alert alert-success">Product added successfully</div>';
        }
        ?>
        <?php
        if (isset($_GET['deleted']) && $_GET['deleted'] == "ok") {
          echo print '<div class="alert alert-success">deleted successfully</div>';
        }
        ?>
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
              <th scope="col">Client name</th>
              <th scope="col">Product</th>
              <th scope="col">Total</th>
              <th scope="col">Date</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>

            <?php
            $i = 0;
            foreach ($paniers as $index =>$order) {
              $i++;
              echo print ' 
                      <th scope="row">' . $i . '</th>
                      <td>' . $order['username'] . '</td>
                      <td>' . $order['nom'] . '</td>
                      <td>' . $order['total'] . ' dt</td>
                      <td>' . $order['date_creation'] . '</td>
                      <td>
                        <a data-toggle="modal" data-target="#modifyModal' . $order['id_pa'] . '" class="btn btn-success">Display</a>
                        <a  data-toggle="modal" data-target="#treat' . $order['id_pa'] . '"class="btn btn-primary">Treat</a>
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
  foreach ($paniers as $index => $pan) { ?>
    <!-- Display  Modify-->
    <div class="modal fade" id="modifyModal<?php echo $pan['id_pa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modifyModal">Order's list</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table" style="border: bold 1px;">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Image</th>
                  <th>Quantite</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  foreach($ordersALL as $index =>$o){
                   if($o['panier']==$pan['id_pa']){ //if cmd appartient (panier overt)
                    echo print '
                    <tr scope="row">
                    <td>'.$o['nom'].'</td>
                    <td><img src="../../imgs/'.$o['image'].'" width="100"</td>
                    <td>'.$o['quantite'].'</td>
                    <td>'.$o['total'].'</td>
                    </tr>
                    ';
                   }
                  }
              ?>
            </tbody>
            </table>
        </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
  <?php
  }

  ?>
<!-- Treat -->
  
<?php
  foreach ($paniers as $index => $pan) { ?>
    <div class="modal fade" id="treat<?php echo $pan['id_pa'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modifyModal">Treat order</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="listO.php" method="post">
              <input type="hidden" value="<?php echo $pan['id_pa'] ?>" name="id_pa">
              <select name="etatc" class="form-control">
                <div class="form-group">
                <option value="in delivery">in delivery</option>
                  <option value="delived">delivred</option>
              </select>
                </div>
                <div class="form-group">
                <button type="submit" name="btnSubmit" class="btn btn-primary mt-1">Save</button>
                </div>
            </form>
        </div>
          <div class="modal-footer">
          </div>
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