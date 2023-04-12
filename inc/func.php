<?php
function getCategory(){


  include 'connect.php';
  // sql query
  $sqlQ = "SELECT * FROM `categories`";

  //exec
  $result = $conn->query($sqlQ);

  //Display

  $categories= $result->fetchAll();

  //check : var_dump($categories);

  return $categories;  
}


function getProducts(){


  include 'connect.php';
  // sql query
  $sqlQ = "SELECT * FROM `produits`";

  //exec
  $result = $conn->query($sqlQ);

  //Display

  $produits= $result->fetchAll();

  //check : var_dump($categories);

  return $produits;  
}



function searchProduits($keyWords){

  include 'connect.php';
  // sql query
  $sqlQ = "SELECT * FROM `produits` WHERE `nom` LIKE '%$keyWords%' ";

  //exec
  $result = $conn->query($sqlQ);

  //Display

  $searchRes= $result->fetchAll();

  //check : var_dump($categories);

  return $searchRes;

}


function getProduitsById($id){

  include 'connect.php';

  $sqlQ = "SELECT * FROM `produits` WHERE `id_p` =$id ";

  //exec
  $result = $conn->query($sqlQ);

  //Display

  $produit = $result->fetch();


  return $produit;
}


function addUser($data){

    include 'connect.php';

    $mphash=md5($data['password']);

   $sqlQ = "INSERT INTO `user`(`username`, `email`, `password`, `phone`, `city`) VALUES ('".$data['username']."','".$data['email']."','".$mphash."','".$data['phone']."','".$data['city']."')";

   $resultat = $conn->query($sqlQ);

  if($resultat){
    return true;
  }else{
    return false;
  }
  }

  function userLogin($data){

    include 'connect.php';

    $email=$data['email'];
    $password=md5($data['password']);

    $sqlQ="SELECT * FROM user WHERE email='$email' and password='$password'";

    $resultat = $conn->query($sqlQ);

    $user=$resultat->fetch();
    
    return $user;
  }
