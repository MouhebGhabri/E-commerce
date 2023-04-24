<?php 

  session_start();  
  //sended on the url
  $id=$_GET['id'];

  $dec_tot = $_SESSION['cart'][3][$id][3]; 

  $_SESSION['cart'][1] -= $dec_tot;



  unset($_SESSION['cart'][3][$id]);

  header('location:../cart.php');

?> 