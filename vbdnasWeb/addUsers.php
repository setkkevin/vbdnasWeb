<?php

session_start();
if($_SESSION['position']=='admin' ||$_SESSION['position']=='User'){
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
<title>Add User From Here</title>
<head>

<div class="container" style="background-color:WHITE">
<?php
include 'menu.html';
?>

<body style="background-color:#cdeeff">

<div id="login">
<h2 align ="center"> Add User From Here</h2>
<table border ="0" align="center">

<form action="addUsers.php" method="POST" >
<tr><td>
First Name :<br>
<td/>
<input type="text" name="firstname" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Second Name<br>
<td/>
<input type="text" name="secondname" required="required" class="form-control"><br>
</td></tr>
<tr><td>
User Name<br>
<td/>
<input type="text" name="username" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Password<br>
<td/>
<input type="text" name="password" required="required" class="form-control"><br>
</td></tr>

<tr><td>
Email<br>
<td/>
<input type="text" name="email" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Telephone<br>
<td/>
<input type="text" name="telephone" required="required" class="form-control"><br>
</td></tr>
<tr><td>
Position<br>
<td/>
<input type="text" name="position" required="required" class="form-control"><br>
</td></tr>

<tr><td>
<input type="SUBMIT" name="send" value="Add User"required="required" class="btn btn-success"><br>
</td></tr>
</table>
</form>

<?php
if(isset($_REQUEST['send'])){

 $firstname=$_POST['firstname'];
 $secondname=$_POST['secondname'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 $email=$_POST['email'];
 $telephone=$_POST['telephone'];
 $position=$_POST['position'];

include 'connect.php';
$querry="INSERT INTO `admins`( `firstname`, `secondname`, `username`,`password`,`email`,`telephone`,`position`)  
                      VALUES ('$firstname','$secondname','$username','$password','$email','$telephone','$position')";
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







<?php
// $firstname=$_POST['firstname'];
// $secondname=$_POST['secondname'];
// $username=$_POST['username'];
// $password=$_POST['password'];
// $email=$_POST['email'];
// $telephone=$_POST['telephone'];

// include 'connect.php';
// $querry="INSERT INTO `admins` ( `firstname`, `secondname`, `username`,`password`,`email`,`telephone`) 
//                      VALUES ('$firstname','$secondname','$username','$password','$email','$telephone')";
// $result=$conn->query($querry);
// if(!$result){
// echo  mysqli_error($conn);
//     exit;
// }else{
// echo "Successifuly Added";
// }
// mysqli_close($conn);
?>