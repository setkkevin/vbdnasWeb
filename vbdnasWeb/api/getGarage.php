<?php
$latitude=$_POST['latitude'];
$longitude=$_POST['longitude'];
include 'connect.php';
$querfy="SELECT `id`, `garagename`, `telephone`,`photo`,`latitude`,`longitude`,
       COALESCE((6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) 
        ), 0) AS distance FROM `garages` ORDER BY distance ASC";
$result=$conn->query($querfy);
while($row=$result->fetch_assoc()){
	$names[]=$row;  
}
 mysqli_close($conn);	
echo'{"garages":'.json_encode($names).'}';
?>