<?php 

  $idc=$_GET['id_p'];
  echo $idc;

  include "../../connect.php";
  
  $sqlQ="DELETE FROM `produits` WHERE `id_p`=$idc";

  $result=$conn->exec($sqlQ);
  
  if($result){
    header('location:listP.php?deleted=ok');
  }

?>