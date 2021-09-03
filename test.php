<?php
    include 'database.php';

    $obj = new Database();

    

    $obj->select('policy','status',null,'status=>"unchecked"');
   
   
?>