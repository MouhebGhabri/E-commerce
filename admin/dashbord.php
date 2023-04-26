<?php
session_start();
if(!isset($_SESSION['nom'])){
  header('location:../LoginA.php');
}

include "../connect.php";
function getStats()
{


  include '../connect.php';
  // sql query categ
  $sqlQC = "SELECT count(*) FROM `categories`";

  //exec
  $result = $conn->query($sqlQC);

  //Display

  $categories = $result->fetchAll();
  //------------------\\
  $sqlQP = "SELECT count(*) FROM `produits`";

  //exec
  $result = $conn->query($sqlQP);

  //Display

  $produits = $result->fetchAll();
    //------------------\\
    $sqlQU = "SELECT count(*) FROM `user`";

    //exec
    $result = $conn->query($sqlQU);
  
    //Display
  
    $users = $result->fetchAll();
      //------------------\\
  $sqlQCO = "SELECT count(*) FROM `commande`";

  //exec
  $result = $conn->query($sqlQCO);

  //Display

  $commande = $result->fetchAll();
  $data=array($categories,$produits,$users,$commande);
  var_dump($data);
  return $data;
}
$datas = getStats();




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
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/dashboard.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">E-comm</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="../LogoutA.php">Log out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
    <?php  include 'template/navA.php'; ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Categories list</h1>
        </div>

        <!-- table -->
        <!-- <div> -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Categories</th>
                <th scope="col">Productes</th>
                <th scope="col">Delivred order's</th>
                <th>Users number</th>
                <th value="<?php date("Y-m-d"); ?>">Date </th>
              </tr>
            </thead>
            <tbody>
            <th><?php echo  substr(implode("",$datas[0][0]),0,1) ;?></th> 
            <th><?php echo  substr(implode("",$datas[1][0]),0,1) ;?></th> 
            <th><?php echo  substr(implode("",$datas[2][0]),0,1) ;?></th> 
            <th><?php echo  substr(implode("",$datas[3][0]),0,1) ;?></th> 
            <th><?php echo date("Y-m-d") ;?></th> 



              <!-- <?php             
                foreach($datas as $i =>$ii){ 
                  echo print ' 
                  <th>' . $ii[0][0] . '</th> 
            ';}
              ?> -->
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>





  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="../js/vendor/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

  <!-- Graphs -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>

</body>

</html>