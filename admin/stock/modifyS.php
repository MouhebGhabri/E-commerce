<?php

  //get admin id 
  session_start();
  //get data from form


  $date_m=date("Y-m-d");
  $id_s=$_POST['id_s'];
  $qtte=$_POST['quantite'];

  // connect to db
  // include "../../inc/func.php";

  // $conn = Connect();
include "../../connect.php";
$date_m=date("Y-m-d");
try{
  //sql query
  $sqlQ="UPDATE `stock` SET `quantite`='$qtte' ,`date_modification`=$date_m WHERE `id_s`=$id_s";
  
  //exec
  $result=$conn->exec($sqlQ);

  if($result){
     header('location:listS.php?modified=ok');
  }

}catch(PDOException $e){
  echo $e;
  if($e->getCode() == 23000){
    header('location:listS.php?err=dup');
  }
}
?>