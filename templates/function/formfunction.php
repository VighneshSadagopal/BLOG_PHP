<?php
include '../classes/autoload.php';


session_start();
if (isset($_POST['submit'])) {

  
    $p = new Post();


    if (!empty($_POST['title']) && !empty($_POST['description'])) {
        $imgname = $_FILES['imgfile']['name'];
     
        $tempname = $_FILES['imgfile']['tmp_name'];
        move_uploaded_file($tempname, "../../images/$imgname");
      
        $id = $_SESSION['id'];
        $author = $_SESSION['username'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $short = substr($description,0,255);
        if(isset($imgname)){
            $data = ['author' => $author, 'title' => $title, 'description' => $description, 'short' => $short, 'category' => $category, 'id' => $id, 'images' => $imgname];
        }
        else{
        $data = ['author' => $author, 'title' => $title, 'description' => $description, 'short' => $short, 'category' => $category, 'id' => $id, 'images' => ''];
        }
        $p->addPost($data);
        $p->db->execute();
       
            header("location:../Authors/welcome?info=success");
            exit;
      
    } else {
        echo "<small> ALL Fields Are Required</small>";
    }
}

else{
    echo "<small2>error</small2>";
}

?>