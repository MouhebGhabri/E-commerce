<?php
session_start();
//if there is no logged user
if(isset($_SESSION['nom'])){
  //header('location:profile.php');
}
include('../connect.php');
include '../inc/func.php';
$admin = true; 
if(!empty($_POST)){ 
 $admin = LoginAdmin($_POST);

  if(is_array($admin) &&  count($admin)>0){
    session_start();
    $_SESSION['id_a']=$admin['id_a'];
    $_SESSION['email'] = $admin['email'] ;
    $_SESSION['nom'] = $admin['nom'];
    $_SESSION['pwda'] = $admin['pwda'];

    header('location:profileA.php');
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
</head>

<body>
  

  <h1 style="text-align: center; margin-top: 35px;">Admin Log IN</h1>
  <div class="col-12 p-5">
    <form action="LoginA.php" method="post">
      <div class="mb-3 mr-3 ml-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">email must be valid.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="pwda" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Log In</button>
    </form>
  </div>
  <?php  include('../inc/footer.php');?>

</body>
<?php  

if(!$admin){
  print "
  <script > alert('email or password invalid !')</script>
  ";
}

?>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min