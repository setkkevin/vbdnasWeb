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
include 'connect.php';
?>

<body style="background-color:#cdeeff">

<div id="login">
<h2 align ="center"> Add Garage From Here</h2>
<table border ="0" align="center">

<form action="addGarage.php" method="POST" enctype="multipart/form-data">
    <tr><td>
    Garage Name :<br>
    <td/>
    <input type="text" name="garagename" required="required" class="form-control"><br>
    </td></tr>
    <tr><td>
    Garage Tel<br>
    <td/>
    <input type="text" name="telephone" required="required" class="form-control"><br>
    </td></tr>
    <tr><td>
    Latitude<br>
    <td/>
    <input type="text" name="latitude" required="required" class="form-control"><br>
    </td></tr>

    <tr><td>
    Longitude<br>
    <td/>
    <input type="text" name="longitude" required="required" class="form-control"><br>
    </td></tr>
    <tr><td>
    Image<br>
    <td/>
    <input type="file" name="image"/>
    </td></tr>
    <tr><td>
    <input type="SUBMIT" name="send" value="Add Garage" class="btn btn-success"><br>
    </td></tr>
    </table>
</form>

<?php
if(isset($_POST['send'])){
 $garagename=$_POST['garagename'];
 $garagetelephone=$_POST['telephone'];
 $latitude=$_POST['latitude'];
 $longitude=$_POST['longitude'];
 
 $filename= $_FILES['image']['name'];
 $filetmpname= $_FILES['image']['tmp_name'];
 $folder='photos/';
 move_uploaded_file($filetmpname, $folder.$filename);

$querry="INSERT INTO `garages`( `garagename`, `telephone`, `latitude`,`longitude`,`photo`)  
                      VALUES ('$garagename','$garagetelephone','$latitude','$longitude','$filename')";
$result=$conn->query($querry);
if(!$result){
    echo  mysqli_error($conn);
    exit; 
else{
   echo "Querry run successifully";
}

    mysqli_close($conn);
}
?>
</div>
<div id="footer">

</div>
</div>
</body>
</html>


