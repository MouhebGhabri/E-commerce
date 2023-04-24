<?php

session_start();


if (!isset($_SESSION['username'])) {
  header('location:../Login.php');
  exit();
}

include '../connect.php';


 $user = $_SESSION['id'];
 $prodId = $_POST['id_p'];
 $qtte = $_POST['quantite'];
 $date = date("Y-m-d");



// products tot
$sqlQ = "SELECT prix,nom FROM produits WHERE `id_p`=$prodId";

$result = $conn->query($sqlQ);

$prod = $result->fetch();
$total = intval($qtte) * intval($prod['prix']);


if(!isset($_SESSION['cart'])){
  $_SESSION['cart']=array($user,0,$date,array());
}
$_SESSION['cart'][1]+=$total;
$_SESSION['cart'][3][]=array($prod['nom'],$prodId,$qtte,$total,$date,$date);






 header('location:../cart.php');
?>