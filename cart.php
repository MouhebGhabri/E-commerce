<?php
session_start();
//if there is no logged user
if(!isset($_SESSION['username'])){
  header('location:Login.php');
}
  
include 'inc/func.php';
$TOT=0;
if(isset($_SESSION['cart'][1])){
  $TOT=$_SESSION['cart'][1];
}
$categories = getCategory();

if (!empty($_POST)) { //checking search btn
  $produits  = searchProduits($_POST['search']);
} else {
  $produits = getProducts();
}

$cmds=array();
if (isset($_SESSION['cart'])) {
  if (count($_SESSION['cart'][3]) > 0) {
    $cmds = $_SESSION['cart'][3];
  }
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

  <div class="row col-12 mt-3 mb-3 p-5" ;>
    <h1>User cart</h1>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Product</th>
              <th scope="col">Quantite</th>
              <th scope="col">Total</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php 
          
              foreach($cmds as $index => $cmd){

                print'
                <tr>
                <th scope="row">'.($index+1).'</th>
                <td>'.$cmd[0].'</td>
                <td>'.$cmd[2].'</td>
                <td>'.$cmd[3].' dt</td>
                <td><a href="act/deleteProdFromPan.php?id='.$index.'" class="btn btn-danger" style=width:75px";>Delete</a>
                </td>
              </tr>
              ';
              }            
              ?>
        

          </tbody>
        </table>

<?php 

      if(!$TOT==0){
          print'        
          <div class="text-end mt-3">
          <h3>
            '.$TOT.'dt</h3>
          <a  onClick="showPopup()"  href="act/confirmCart.php" class="btn btn-success" style="width: 100px" ;>Confirm</a>
          <hr> 
        </div>';
      }else{
        print '
        <div class="text-end mt-3">
        <h3>
          0 dt</h3>
        <button class="btn btn-default" style="width: 100px;">Confirm</button>
        <hr> 
      </div>
        ';
      }

?>
  </div>

  <?php include('inc/footer.php'); ?>
  </div>
  <div id="popup" style="display:none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border: 1px solid black;">
    <h2 style="text-align: center;">Success</h2>
    <button onclick="hidePopup()">Close</button>
</div>
<script>
function showPopup() {
    document.getElementById("popup").style.display = "block";
}

function hidePopup() {
    document.getElementById("popup").style.display = "none";
}
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</html>