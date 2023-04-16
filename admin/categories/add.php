<?php

  //get admin id 
  session_start();
  //get data from form

  $nomC=$_POST['nomCat'];
  $descriptionC=$_POST['descriptionCat'];
  $creator=$_SESSION['id_a'];
  $date_c=date("Y-m-d");

  // connect to db
  // include "../../inc/func.php";

  // $conn = Connect();
  include "../../connect.php";


  try{
    
      //sql query
  $sqlQ="INSERT INTO categories(`nom_c`, `description`, `createur`,`date_creation`) VALUES ('$nomC','$descriptionC','$creator',$date_c)";
  
  //exec
  $result=$conn->exec($sqlQ);

  if($result){
    header('location:list.php?added=ok');
  }

  }catch(PDOException $e){

    if($e->getCode() == 23000){
      header('location:list.php?err=dup');
    }

  }

?>