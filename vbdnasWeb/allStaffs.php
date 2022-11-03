
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
<form action="allStaffs.php" class="navbar-form navbar-left" role="search" method="POST">
<div class="form-group">
<!--<input type="text" name="date" class="form-control" id="datepicker" >-->
<input type="text" name="search" class="form-control" >
</div>
<input type="submit" name="show" value="Show" class="btn btn-success">
</form>

</div>
</nav>
<h1 align="center">list clients</h1>

<?php
include'connect.php';
$querry="SELECT `id`, `firstname`, `secondname`, `username`, `password`, `email`, `telephone`, `position`, `photo` FROM `admins` WHERE 1";
if(isset($_REQUEST['show'])){
$search=$_REQUEST['search'];
$querry="SELECT `id`,`firstname`, `secondname`, `username`, `password`, `email`, `telephone`, `position`,`photo` FROM `admins`
              WHERE  id='$search' or  firstname='$search' or  secondname='$search'  or username='$search' or email='$search' 
			  or photo='$search'";
            
}
$result=$conn->query($querry);
echo '<table border="1" id="tableorders" class="table table-striped">';
echo '<tr><th> Id</th><th>First Name</th><th> Second Name</th><th> Username</th>
                             <th>Password</th><th>Email</th> <th>Telephone</th><th>Position</th><th>Photo</th><th>EDIT</th></tr>';
if($result){
while($query_row=$result->fetch_assoc() ){
$id=$query_row['id'];
$firstname=$query_row['firstname'];
$secondname=$query_row['secondname'];
$username=$query_row['username'];
$password=$query_row['password'];
$email=$query_row['email'];
$telephone=$query_row['telephone'];
$position=$query_row['position'];
$photo=$query_row['photo'];

echo '<tr>';
echo '<td>';
echo $id;
echo '</td>';

echo '<td>';
echo $firstname;
echo '</td>';

echo '<td>';
echo $secondname;
echo '</td>';

echo '<td>';
echo $username;
echo '</td>';

echo '<td>';
echo $password;
echo '</td>';

echo '<td>';
echo $email;
echo '</td>';
echo '<td>';
echo $telephone;
echo '</td>';
echo '<td>';
echo $position;
echo '</td>';
echo '<td>';
echo $photo;
echo '</td>';


echo '<td>';
echo '<a href='."updateStaffs.php?id=$id&firstname=$firstname&secondname=$secondname&username=$username&password=$password&email=$email&telephone=$telephone&position=$position".'>'.'Update&nbsp'.'</a>';
echo '<a href='."deleteAdmin.php?id=$id".'>'.'&nbspRemove'.'</a><br>';
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