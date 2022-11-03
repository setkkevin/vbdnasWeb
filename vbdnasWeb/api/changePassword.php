<?php
$username=$_POST['username'];
$oldPassword=$_POST['oldPassword'];
$newPassword=$_POST['newPassword'];


// $username="seth";
// $oldPassword="mubya";
// $newPassword="mubya";


include 'connect.php';

$querfy="SELECT * FROM `admins` WHERE username='$username'";
$result=$conn->query($querfy);
while($row=$result->fetch_assoc()){
  $password=$row['password']; 
}

 if
 ($oldPassword == $password){
  //echo $password;
    $querry="UPDATE `admins` SET `password`='$newPassword' WHERE username='$username'";  
    $result=$conn->query($querry);
    if(!$result){
      echo  mysqli_error($conn);
      exit;
    }else{
      echo 'Successfully';
    }
      mysqli_close($conn);
  }else{
    echo "Try another";
  }
?>