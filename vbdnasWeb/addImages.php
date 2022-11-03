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
<h2 align ="center"> Add Image From Here</h2>
<table border ="0" align="center">

<form action="addImages.php" method="POST" enctype="multipart/form-data">

<input type="File" name="image"/>

<input type="SUBMIT" name="send"   value="upload"/>

</table>
</form>

<?php


if(isset($_POST['send'])){
 $filename= $_FILES['image']['name'];
 $filetmpname= $_FILES['image']['tmp_name'];
 $folder='api/uploads/';
  
 move_uploaded_file($filetmpname, $folder.$filename);

$querry="INSERT INTO `photos`(`photo`)  VALUES ('$filename')";

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


