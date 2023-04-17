<?php

  //get admin id 
  session_start();
  //get data from form

  $nomC=$_POST['nomProd'];
  $descriptionC=$_POST['descriptionProd'];
  $creator=$_SESSION['id_a'];
  $date_m=date("Y-m-d");
  $price=$_POST['prix'];
  $id_c=$_POST['categ'];
  $id_p=$_POST['id_p'];

  // connect to db
  // include "../../inc/func.php";

  // $conn = Connect();
  include "../../connect.php";
$date_m=date("Y-m-d");
try{
  //sql query
  $sqlQ="UPDATE `produits` SET `nom`='$nomC',`description`='$descriptionC',`prix`=$price,`categorie`=$id_c,`createur`=$creator,`date_modification`=$date_m WHERE `id_p`=$id_p";
  
  //exec
  $result=$conn->exec($sqlQ);

  if($result){
     header('location:listP.php?modified=ok');
  }

}catch(PDOException $e){
  echo $e;
  if($e->getCode() == 23000){
    header('location:listP.php?err=dup');
  }
}
?>