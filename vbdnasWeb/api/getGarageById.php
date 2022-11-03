<?php
//http://localhost/contacts/getContacts.php
//Successifuly Added
$id=$_POST['id'];
include 'connect.php';

$query="SELECT `id`, `garagename`, `telephone`, `telephone`,`latitude`,`longitude` FROM `garages` WHERE id='$id'";
$result=$conn->query($query);
while($row=$result->fetch_assoc()){
	$names[]=$row;  
}
 mysqli_close($conn);	
echo'{"contacts":'.json_encode($names).'}';
?>