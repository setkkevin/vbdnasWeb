<?php
// session_start();
// if($_SESSION['position']=='admin'){
    
// }
// else{
// header( 'Location:index.php' ) ;
// }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="printer.js"></script>
<title>All Garages</title>
<head>
<?php
include 'menu.html';
?>

<div class="container">

<body style="background-color:white">
<div id="toPrint">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
<a class="navbar-brand" href="#">Search</a>
</div>
<div>
<form action="allGarages.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">list Garages</h1>

<?php
include'connect.php';
//select marks.id,marks.name,marks.marks,address.location  from marks join address where marks.id=address.id;
$querry="SELECT garages.id, garages.garagename, garages.telephone, garages.latitude, garages.longitude, admins.position "." FROM garages, admins "." WHERE garages.id = admins.id ";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `id`,`garagename`, `telephone`, `latitude`, `longitude`, `photo`  FROM `garages`
              WHERE  id='$search' or  garagename='$search' or telephone='$search' or latitude='$search' or longitude='$search' 
			  or photo='$search'";
}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th> Id</th><th>Garage Name</th><th>Garage Tel</th><th>Garage Lat</th>
                             <th>Garage Long</th><th>Garage Photo </th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$id=$query_row['id'];
$garagename=$query_row['garagename'];
$telephone=$query_row['telephone'];
$latitude=$query_row['latitude'];
$longitude=$query_row['longitude'];
$positionFromAdmin=$query_row['position'];

echo '<tr>';
echo '<td>';
echo $id;
echo '</td>';

echo '<td>';
echo $garagename;
echo '</td>';

echo '<td>';
echo $telephone;
echo '</td>';

echo '<td>';
echo $latitude;
echo '</td>';

echo '<td>';
echo $longitude;
echo '</td>';

echo '<td>';
echo $positionFromAdmin;
echo '</td>';


echo '<td>';
echo '<a href='."updateGarages.php?id=$id&garagename=$garagename&telephone=$telephone&latitude=$latitude&longitude=$longitude".'>'.'Update&nbsp'.'</a>';
echo '<a href='."deleteGarage.php?id=$id".'>'.'&nbspRemove'.'</a><br>';
echo '</td>';
echo '<tr>';
}
echo '</table>';
}
else
echo  mysqli_error($conn);
echo '</form>';

?>

</div>
<input type="button"onclick="this.style.visibility = 'hidden';printDiv('toPrint')"  value="Print" />
<div>
<div id="footer">

</div>

</body>
</html>



<?php
// $latitude=$_POST['latitude'];
// $longitude=$_POST['longitude'];
// include 'connect.php';
// $querfy="SELECT `id`, `garagename`, `telephone`, `telephone`,`photo`,
//        COALESCE((6371 * acos( cos( radians({$latitude}) ) * cos( radians( `latitude` ) ) * cos( radians( `longitude` ) - radians({$longitude}) ) + sin( radians({$latitude}) ) * sin( radians( `latitude` ) ) ) 
//         ), 0) AS distance FROM `garages` ORDER BY distance ASC";
// $result=$conn->query($querfy);
// while($row=$result->fetch_assoc()){
// 	$names[]=$row;  
// }
//  mysqli_close($conn);	
// echo'{"garages":'.json_encode($names).'}';
?>