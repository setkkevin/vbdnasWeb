<?php

include 'connect.php';
$querfy="SELECT `id`, `firstname`, `secondname`, `username`,`password`,`email`,`telephone` FROM `admins` WHERE 1";
$result=$conn->query($querfy);
while($row=$result->fetch_assoc()){
	$names[]=$row;  
}
 mysqli_close($conn);	
echo'{"admins":'.json_encode($names).'}';
?>