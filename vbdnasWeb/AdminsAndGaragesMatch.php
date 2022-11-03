<?php
$username=$_POST['username'];
$password=$_POST['password'];
include 'connect.php';

$querry="Select `password` from `admins` where `username`='$username'";

$result=$conn->query($querry);
while($row=$result->fetch_assoc()){
	$names=$row;  
}
 mysqli_close($conn);
 $pin =	json_encode($names);
 $pp='{"password":"'.$password.'"}';
 echo $pp;
if($pin==$pp){
    echo 'go';
}else{
    echo 'back';
}
?>