<?php

  //get admin id 
  session_start();
  //get data from form

  $nomC=$_POST['nomCat'];
  $descriptionC=$_POST['descriptionCat'];
  $creator=$_SESSION['id_a'];
  $date_m=date("Y-m-d");
  $id=intval($_POST['id_c']);
  $idd=$_POST['id_c'];

  // connect to db
  // include "../../inc/func.php";

  // $conn = Connect();
  include "../../connect.php";

  //sql query
  $sqlQ="UPDATE `categories` SET `nom_c`='$nomC',`description`='$descriptionC',`createur`=$creator,`date_modification`=$date_m WHERE `id_c`=$idd";
  
  //exec
  $result=$conn->exec($sqlQ);

  if($result){
    header('location:list.php?modified=ok');
  }

?>