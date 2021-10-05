<?php

require_once ('../classes/autoload.php');
$delete=new Users;

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}
$id= $_GET['id'];
$delete->deleteUser($id);
if($delete){
   header("location:../Authors/authinfo.php?info==deleted");
   
}
else{
    echo "<script>alert('Deletion failed.')</script>";
}
?>

