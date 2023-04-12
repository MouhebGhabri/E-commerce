<?php
  include ('connect.php') ;
  include 'inc/func.php';
  $userWellAdded=0;
  if(!empty($_POST)){ 
      if(addUser($_POST)){
        $userWellAdded =1;
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

</html>
</head>

<body>

<?php  include ('inc/navbar.php')    ?>

  <h1 style="text-align: center;margin-top: 35px;">Sign UP</h1> 

  <div class="col-12 p-5">
    <form action="Signup.php" method="POST">
      <div class="mb-3 mr-3 ml-3">
        <label for="exampleInputEmail1" class="form-label">username</label>
        <input type="text" class="form-control" name="username" id="emailID" aria-describedby="emailHelp">
        <div id="usernameHelp" class="form-text">username must be unique</div>
        <div class="mb-3 mr-3 ml-3">
          <label for="exampleInputEmail1" class="form-label">Phone</label>
          <input type="text" class="form-control" name="phone" id="phoneID" aria-describedby="emailHelp">
          <div id="phoneHelp" class="form-text">Phone must be valid. </div>
        </div>
      </div>
      <div class="mb-3 mr-3 ml-3">
        <label for="exampleInputEmail1" class="form-label">City</label>
        <input type="text" class="form-control" name="city" id="cityID" aria-describedby="emailHelp">
      </div>
      <div class="mb-3 mr-3 ml-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" id="emailID" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">email must be valid.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="passwordID">
      </div>
      <button type="submit" class="btn btn-primary">Sign UP</button>
    </form>
  </div>

  <!-- footer -->
  </div>
  <?php  include('inc/footer.php');?>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
  integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
<?php
  
  if($userWellAdded==1){
    print "
    <script > alert('registred succesfully')</script>
    ";
  }



?>
</html>