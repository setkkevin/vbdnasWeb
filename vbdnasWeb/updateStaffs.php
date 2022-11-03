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
<h2 align ="center"> Update Staff From Here</h2>
<table border ="0" align="center">

<form action="updateStaffs.php" method="POST" >
<tr><td>   
User Id :<br>
<td/>
<input type="text" name="id" required="required" class="form-control"value="<?php if(isset($_GET['id'])){echo $_GET['id'];}?>"><br>
</td></tr>
<tr><td>
First Name :<br>
<td/>
<input type="text" name="firstname" required="required" class="form-control"value="<?php if(isset($_GET['firstname'])){echo $_GET['firstname'];}?>"><br>
</td></tr>
<tr><td>
Second Name<br>
<td/>
<input type="text" name="secondname" required="required" class="form-control"value="<?php if(isset($_GET['secondname'])){echo $_GET['secondname'];}?>"><br>
</td></tr>
<tr><td>
User Name<br>
<td/>
<input type="text" name="username" required="required" class="form-control"value="<?php if(isset($_GET['username'])){echo $_GET['username'];}?>"><br>
</td></tr>

<tr><td>
Password<br>
<td/>
<input type="text" name="password" required="required" class="form-control"value="<?php if(isset($_GET['password'])){echo $_GET['password'];}?>"><br>
</td></tr>

<tr><td>
Email<br>
<td/>
<input type="text" name="email" required="required" class="form-control"value="<?php if(isset($_GET['email'])){echo $_GET['email'];}?>"><br>
</td></tr>
<tr><td>
Telephone<br>
<td/>
<input type="text" name="telephone" required="required" class="form-control"value="<?php if(isset($_GET['telephone'])){echo $_GET['telephone'];}?>"><br>
</td></tr>
<tr><td>
Position<br>
<td/>
<input type="text" name="position" required="required" class="form-control"value="<?php if(isset($_GET['position'])){echo $_GET['position'];}?>"><br>
</td></tr>

<tr><td>
<input type="SUBMIT" name="send" value="Update staff"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>
<?php
if(isset($_REQUEST['send'])){
    $id=$_POST['id'];
    $firstname=$_POST['firstname'];
    $secondname=$_POST['secondname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    $position=$_POST['position'];
   
   include 'connect.php';

$querry="UPDATE `admins` SET `id`='$id',`firstname`='$firstname',`secondname`='$secondname',`username`='$username',`password`='$password',`email`='$email',`position`='$position'WHERE id='$id'";
$result=$conn->query($querry);
if(!$result){
echo  mysqli_error($conn);
    exit;
}
else{
echo "Querry run successifully";
header( 'Location:allStaffs.php' ) ;
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


