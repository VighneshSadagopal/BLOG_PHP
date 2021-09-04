<?php

include ('post.php');

$pid= $_GET['pid'];
session_start();

$p= new Post();
$p->deletePost($pid);
if($p){
    header("location:editpost.php?info=deleted");
   
}
else{
    echo "<script>alert('updation failed.')</script>";
}
?>

