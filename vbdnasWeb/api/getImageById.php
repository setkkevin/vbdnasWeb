<?php
$username=$_POST['username'];
//$username='kabya';
include'connect.php';
$querry="Select `photo`from `admins` where `username`='$username'";
$result=$conn->query($querry);
if($result){
while($query_row=$result->fetch_assoc() ){
$photo=$query_row['photo'];
}
}
else
echo  mysqli_error($conn);
  
echo $photo;

?>