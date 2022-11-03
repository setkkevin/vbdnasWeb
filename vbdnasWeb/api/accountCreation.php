<?php

$username=$_POST['username'];
$password=$_POST['password'];
include 'connect.php';
//select from admins
$querry="Select * from `admins` where `username`='$username'";
$result=$conn->query($querry);
if(mysqli_num_rows($result)>0){
    echo 'Back';
}else{
    $querry="INSERT INTO `admins` (  `username`,`password`) 
                     VALUES ('$username','$password')";
    $result=$conn->query($querry);
    if(!$result){
      echo  mysqli_error($conn);
      exit;
    }else{
      echo 'Successfully';
    }
}

mysqli_close($conn);
?>