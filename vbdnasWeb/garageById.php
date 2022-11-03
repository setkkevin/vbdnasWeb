<?php

session_start();
if($_SESSION['position']=='leader'){
}
else{
header( 'Location:index.php' ) ;
}
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
include 'menuId.html';
?>

<div class="container">

<body style="background-color:white">
<div id="toPrint">
<nav class="navbar navbar-default" role="navigation">
<div class="navbar-header">
</div>

</nav>

<?php
include'connect.php';
$id=$_SESSION['id'];
$querry="SELECT `id`, `garagename`, `telephone`,`latitude`, `longitude`, `photo` FROM `garages` WHERE `id`='$id'";

$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th> Id</th><th>Garage Name</th><th>Garage Tel</th><th>Garage Lat</th>
                             <th>Garage Long</th><th>Garage Photo </th><th> ACTIONS </th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$id=$query_row['id'];
$garagename=$query_row['garagename'];
$telephone=$query_row['telephone'];
$latitude=$query_row['latitude'];
$longitude=$query_row['longitude'];
$photo=$query_row['photo'];

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
echo $photo;
echo '</td>';

echo '<td>';
echo '<a href='."updateGarageById.php?id=$id&garagename=$garagename&telephone=$telephone&latitude=$latitude&longitude=$longitude&photo=$photo".'>'.'Update&nbsp'.'</a>';
echo '</td>';

echo '<tr>';
}
echo '</table>';
}
else
echo  mysqli_error($conn);
echo '</form>';

?>


<div id="footer">

</div>

</body>
</html>
