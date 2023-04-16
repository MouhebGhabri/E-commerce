<?php
session_start();

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
        <a class="nav-link" href="../../Logout.php">Log out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link  active" href="#">
                <span data-feather="file"></span>
                categories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item"> 
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../profileA.php">
                <span data-feather="layers"></span>
                Profile
              </a>
            </li>
          </ul>


        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Categories list</h1>

          <div>
            <a  data-toggle="modal" data-target="#exampleModal"  class="text-primary" style="text-decoration:underline;">Add</a>
          </div>
        </div>
        <!-- check if cat is added -->
            <?php
              if(isset($_GET['added']) && $_GET['added']=="ok"){
                 echo print '<div class="alert alert-success">Category successfully</div>';
              }
            ?>
            <?php
              if(isset($_GET['deleted']) && $_GET['deleted']=="ok"){echo print '<div class="alert alert-success">deleted successfully</div>';}
            ?>
            <?php
              if(isset($_GET['modified']) && $_GET['modified']=="ok"){echo print '<div class="alert alert-success" >modified successfully</div>';}
            ?>

        <!-- table -->
        <!-- <div> -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $i = 0;
              foreach ($categories as $cat) {
                $i++;
                echo print ' 
                      <th scope="row">' . $i . '</th>
                      <td>' . $cat['nom_c'] . '</td>
                      <td>' . $cat['description'] . '</td>
                      <td>
                        <a data-toggle="modal" data-target="#modifyModal'.$cat['id_c'].'" class="btn btn-success">Modify</a>
                        <a href="delete.php?id_c='.$cat['id_c'].'" class="btn btn-danger">Delete</a>
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


<!-- Modal  add-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="add.php">
              <div class="form-group">
                <input type="text" class="form-control" name="nomCat" placeholder="Category name" required>
                  <br>
                <textarea  class="form-control" name="descriptionCat" placeholder="Description" required></textarea>
              </div>
    </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
      </form>
    </div>
  </div>
</div>  

<?php 

  foreach($categories as $index =>$cat){?>
  <!-- Modal  Modify-->
<div class="modal fade" id="modifyModal<?php echo $cat['id_c'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyModal">Modify category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="modify.php">
              <div class="form-group">
                <input type="hidden" value="<?php echo $cat['id_c'];?>" name="id_c" required>
                <input type="text" class="form-control" name="nomCat" value="<?php echo $cat['nom_c'] ?>" required placeholder="Category name">
                  <br>
                <textarea  class="form-control" name="descriptionCat"  placeholder="Description"><?php echo $cat['description'] ?></textarea>
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

</body>

</html>