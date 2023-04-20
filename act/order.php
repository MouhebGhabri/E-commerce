<?php

session_start();


// if (!isset($_SESSION['username'])) {
//   header('location:../Login.php');
//   exit();
// }

include '../connect.php';


 $user = $_SESSION['id'];
 $prodId = $_POST['id_p'];
 $qtte = $_POST['quantite'];
 $date = date("Y-m-d");



// products tot
$sqlQ = "SELECT prix,nom FROM produits WHERE `id_p`=$prodId";

$result = $conn->query($sqlQ);

$price = $result->fetch();
$total = intval($qtte) * intval($price['prix']);


if(!isset($_SESSION['cart'])){
  $_SESSION['cart']=array($user,0,$date,array());
}
$_SESSION['cart'][1]+=$total;
$_SESSION['cart'][3][]=array($price['nom'],$prodId,$qtte,$total,$date,$date);





// //create cart
// $sqlPanier = "INSERT INTO `panier`(`user`, `total`, `date_creation`) VALUES ('$user','$total','$date')";


// $conn->lastInsertId();

// $resP=$conn->exec($sqlPanier);
// $panierID=$conn->lastInsertId();
// var_dump($conn->lastInsertId());


// //order
// $sqlQ = "INSERT INTO `commande`(`produit`, `quantite`, `panier`, `total`, `date_creation`, `date_modification`) VALUES('$prodId','$qtte',$panierID,'$total','$date','$date')";

// $result = $conn->exec($sqlQ);
 header('location:../cart.php');
?>