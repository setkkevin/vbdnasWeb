<?php
$response="FAILED";
require_once 'connect.php';
if(isset($_REQUEST['submit'])){

    $username=$_POST['receivedUsername'];
    $fileName=basename($_FILES['files']['name']);
    $type=basename($_FILES['files']['type']);
    $tmp=explode('.', $fileName);
    $ext = end($tmp);
    $path='uploads/'.$fileName;
    $fileName=$fileName.".".$type;

	if(move_uploaded_file($_FILES['files']['tmp_name'],$path)){

        $sql="UPDATE `admins` SET `photo`='$fileName' WHERE username=$username";                      

        if($conn->query($sql) === TRUE){
            $response="ok ".$sql;
        } else {
            $response="FAILED ".$sql;
        }
	}	else{
		$response="FAILED ".$_FILES['files']['tmp_name'];
    }
  echo $response; 
}
?>