<?php
 $username=$_POST['username'];
 $newUsername=$_POST['newUsername'];

// $orginalUsername="seth";
// $username="kabwa";

 include 'connect.php';

    $querry="UPDATE `admins` SET `username`='$newUsername' WHERE username='$username'";  
    $result=$conn->query($querry);
    if(!$result){
      echo  mysqli_error($conn);
      exit;
    }else{
      echo 'Successfully';
    }
      mysqli_close($conn);

?>