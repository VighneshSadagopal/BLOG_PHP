<?php

require_once ('autoload.php');
$delete=new users;

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$id= $_GET['id'];
$delete->deleteUser($id);
if($delete){
   header("location:authinfo.php?info==deleted");
   
}
else{
    echo "<script>alert('Deletion failed.')</script>";
}
?>

