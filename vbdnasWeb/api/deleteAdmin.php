<?php

$id=0;
include 'connect.php';
if(isset($_GET['id'])){
  //  echo $_GET['id'];
$id=$_GET['id'];
}
$querry=" select * from `admins` where  `id`='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}else{
echo "Successifuly ";
}
mysqli_close($conn);
?>