<?php 
session_start();
include '../connect.php';
  
  $user=$_SESSION['id'];
  $total=$_SESSION['cart'][1];
  $date=date('Y-m-d');

// //create cart
$sqlPanier = "INSERT INTO `panier`(`user`, `total`, `date_creation`) VALUES ('$user','$total','$date')";


// $conn->lastInsertId();

 $resP=$conn->exec($sqlPanier);
 $panierID=$conn->lastInsertId();
// var_dump($conn->lastInsertId());

$commds=$_SESSION['cart'][3];

foreach($commds as $i =>$cmd){
$prodId=$cmd[1];
$qtte=$cmd[2];
$total=$cmd[3];
// //order
$sqlQ = "INSERT INTO `commande`(`produit`, `quantite`, `panier`, `total`, `date_creation`, `date_modification`) VALUES('$prodId','$qtte',$panierID,'$total','$date','$date')";
  //pnom id qtte tot datec datem

$result = $conn->exec($sqlQ);

}

$_SESSION['cart']=null;
header('location:../index.php');



?>