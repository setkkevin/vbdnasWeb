<?php
 $username=$_POST['username'];
 $filename= $_FILES['image']['name'];
 $filetmpname= $_FILES['image']['tmp_name'];
 $ImageData = $_POST['image_path'];
 $ImageName = $_POST['image_name'];
 $folder='photos/';
  
 move_uploaded_file($filetmpname, $folder.$filename);

 $querry="UPDATE `admins` SET `photo`='$filename' WHERE username='$username'";
 echo  $querry;

$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
echo "Querry run successifully";
}

    mysqli_close($conn);

?>
<?php

?>