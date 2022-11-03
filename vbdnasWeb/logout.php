<?php
session_start();
if(isset($_SESSION['username'])){
unset($_SESSION['username']);
}
if(isset($_SESSION['password'])){
unset($_SESSION['password']);
}
if(isset($_SESSION['position'])){
unset($_SESSION['position']);
}
if(isset($_SESSION['id'])){
unset($_SESSION['id']);
}
   //  Must start a session before destroying it
header( 'Location:index.php' ) ;
?>