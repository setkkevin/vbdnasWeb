<?php
$username=$_POST['username'];
$password=$_POST['password'];
include 'connect.php';

$querry="Select * from `admins` where `username`='$username' and `password`='$password'";
$result=$conn->query($querry);
if(mysqli_num_rows($result)>0){
    echo 'go';
}else{
    echo 'back';
}
?>