<?php 

  $idc=$_GET['id_c'];
  echo $idc;

  include "../../connect.php";
  
  $sqlQ="DELETE FROM `categories` WHERE `id_c`=$idc";

  $result=$conn->exec($sqlQ);
  
  if($result){
    header('location:list.php?deleted=ok');
  }

?>