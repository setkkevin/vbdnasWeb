
<?php
session_start();
if($_SESSION['position']=='admin'){
    
}
else{
header( 'Location:index.php' ) ;
}
?>
<?php

$id=0;
include 'connect.php';
if(isset($_GET['id'])){
$id=$_GET['id'];
}
$querry=" DELETE FROM `admins` WHERE   `id`='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}else{
echo "Successifuly ";
header( 'Location:allStaffs.php' ) ;
}
mysqli_close($conn);
?>