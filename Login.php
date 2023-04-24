<?php
session_start();
//if there is no logged user
if(isset($_SESSION['username'])){
  header('location:profile.php');
}
include('connect.php');
include 'inc/func.php';
$user = true; 
if(!empty($_POST)){ 
  $user = userLogin($_POST);

  if(is_array($user) && count($user)>0){
    session_start();
    $_SESSION['id']=$user['id'];
    $_SESSION['email'] = $user['email'] ;
    $_SESSION['username'] = $user['username'];
    $_SESSION['password'] = $user['password'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['city'] = $user['city'];
    $_SESSION['etat'] = $user['etat'];

    header('location:profile.php');
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
  <?php include('inc/navbar.php'); ?>

  <h1 style="text-align: center; margin-top: 35px;">Log IN</h1>
  <div class="col-12 p-5">
    <form action="Login.php" method="post">
      <div class="mb-3 mr-3 ml-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">email must be valid.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
      <button type="submit" class="btn btn-primary">Log In</button>
    </form>
  </div>
  <?php  include('inc/footer.php');?>

</body>
<?php  

if(!$user){
  print "
  <script > alert('email or password invalid !')</script>
  ";
}

?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min