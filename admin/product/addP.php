 <?php 
  session_start();
 
  include "../../connect.php";


  

  $nomP=$_POST['nomProd'];
  $descriptionP=$_POST['descriptionProd'];
  $category=$_POST['categ'];
  $price=$_POST['prix'];
  $creator=$_POST['creator'];
  $date =date("Y-m-d");


  //img upload
$target_dir = "../../imgs/";
$target_file = $target_dir . basename($_FILES["imgProd"]["name"]);

if (move_uploaded_file($_FILES["imgProd"]["tmp_name"], $target_file)) {
 
    $image= $_FILES["imgProd"]["name"];
 
}else{
  echo "can't upload img";
}
  
try{
    
  //sql query
$sqlQ="INSERT INTO `produits`(`nom`, `description`, `image`, `prix`, `categorie`, `createur`, `date_creation`) VALUES ('$nomP','$descriptionP','$image','$price','$category','$creator','$date')";

//exec
$result=$conn->exec($sqlQ);

if($result){
header('location:listP.php?added=ok');
}

}catch(PDOException $e){

if($e->getCode() == 23000){
  header('location:listP.php?err=dup');
}
}
 
 ?>