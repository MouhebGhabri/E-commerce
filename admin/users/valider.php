<?php 

include "../../connect.php";

  $iduser = $_GET['id'];
  $sqlQ = "UPDATE `user` SET `etat`=1  WHERE `id`=$iduser";

  $result = $conn ->exec($sqlQ);
  
  if($result){
    header('location:listU.php?valid=ok');
  }else{
    echo "err"; 
  }


?>