<?php
session_start();
if($_SESSION['position']=='admin'){
    
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
<title>Add Garage From Here</title>
<head>

<div class="container" style="background-color:WHITE">
<?php
include 'menu.html';
?>

<body style="background-color:#cdeeff">

<div id="login">
<h2 align ="center"> Add Garage From Here</h2>
<table border ="0" align="center">

<form action="updateGarages.php" method="POST">
<tr><td>   
Garage Id :<br>
<td/>
<input type="text" name="id" required="required" class="form-control"value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>"><br>
</td></tr>
<tr><td>   
Garage Name :<br>
<td/>
<input type="text" name="garagename" required="required" class="form-control"value="<?php if(isset($_GET['garagename'])){echo $_GET['garagename'];}?>"><br>
</td></tr>
<tr><td>
Garage Tel<br>
<td/>
<input type="text" name="telephone" required="required" class="form-control"value="<?php if(isset($_GET['telephone'])){echo $_GET['telephone'];}?>"><br>
</td></tr>
<tr><td>
Latitude<br>
<td/>
<input type="text" name="latitude" required="required" class="form-control"value="<?php if(isset($_GET['latitude'])){echo $_GET['latitude'];}?>"><br>
</td></tr>

<tr><td>
Longitude<br>
<td/>
<input type="text" name="longitude" required="required" class="form-control"value="<?php if(isset($_GET['longitude'])){echo $_GET['longitude'];}?>"><br>
</td></tr>

<tr><td>
Photo_Name<br>
<td/>
<input type="text" name="photo" required="required" class="form-control"value="<?php if(isset($_GET['photo'])){echo $_GET['photo'];}?>"><br>
</td></tr>

<tr><td>
<input type="SUBMIT" name="send" value="Update Garage"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
include 'connect.php';

if(isset($_REQUEST['send'])){
 $id=$_REQUEST['id'];
 $garagename=$_POST['garagename'];
 $garagetelephone=$_POST['telephone'];
 $latitude=$_POST['latitude'];
 $longitude=$_POST['longitude'];
 $photo=$_POST['photo'];

$querry="UPDATE `garages` SET `garagename`='$garagename',`telephone`='$garagetelephone',`latitude`='$latitude',`longitude`='$longitude',`photo`='$photo' WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
echo "Querry run successifully";

}

    mysqli_close($conn);
}

?>
<?php

?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>


