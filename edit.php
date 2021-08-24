<?php

include ('config.php');
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$usertype=$_SESSION['usertype'];
$id=$_SESSION['id'];
$author=$_SESSION['username'];
$pid= $_GET['pid'];

if($usertype=="admin"){
    $query=mysqli_query($conn,"SELECT * FROM `post` where pid='$pid'");
}
if($usertype=="user"){
$query=mysqli_query($conn,"SELECT * FROM `post`INNER JOIN users ON post.id =  '$id' where pid='$pid' ");
}

if ($query->num_rows > 0){

    while($res=mysqli_fetch_array($query)){
       
      
           
       $files=$res['images'];
        $author=$res['author'];
        $title=$res['title'];
        $description= $res['description'];
        $short= $res['short'];
    }
            }
            else{
                echo "<script>alert('LogIn To Your Account.')</script>";
                $author="";
                $title="";
                $description="";
                $short="";

            }

        
       
?>
<?php

    if(isset($_POST['update'])){

        $imgname = $_FILES['image']['name'];
    
        $tempname = $_FILES['image']['tmp_name'];
        move_uploaded_file($tempname,"images/$imgname");
        $author=$_POST['author'];
        $title=$_POST['title'];
        $description=$_POST['description'];
        $short=$_POST['short'];

        $result=mysqli_query($conn,"UPDATE post SET images='$imgname',author='$author',title='$title',description='$description',short='$short'where pid='$pid'");
        if($result){
          
            echo "<script>alert('Successfully Updated.')</script>";
        }
        else{
            echo "<script>alert('updation failed.')</script>";
        }
    }
    $sql=mysqli_query($conn,"SELECT * from users where username='$author' ");
            
    if ($sql->num_rows > 0){
    
    while($row = mysqli_fetch_array($sql))
    {
    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/createpost.css">
        <link rel="stylesheet" href="css/footer.css">  
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <img src="">
        <nav class="navbar">
    <div class="content">
      <div class="logo">
        <img src="css/images/logo2.png">
      </div>
      <ul class="menu-list">
        <div class="icon cancel-btn">
          <i class="fas fa-times"></i>
        </div>
        <li><a href="login.php">Dashboard</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Services</a></li>
        <li><?php echo "<a href=\"mypost.php?id=$row[id]\">"?>My Post</a></li>
        
        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="tiny material-icons" >arrow_drop_down_circle</i></a>
            <ul>
                <li ><?php echo "<a href=\"account.php?id=$row[id]\">"?>VIEW DETAILs</a></li>
                <li ><a href=""><i class="tiny material-icons" >power_settings_new</i>&nbsp;LOGOUT</a></li>
            </ul>
        </li>
</div>
        
      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>
        <div class="container">
            <form action="" method="post" class="login-email"  enctype="multipart/form-data">
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Author Name : </p>
                <div class="input-group">
                <input type="text" value=<?php echo $author?> name="author">
                </div>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">POST TITLE</p>
                <div class="input-group">
                <input type="text" placeholder="Title Name"value=<?php echo $title?> name="title">
                </div>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Description</p>
                <div class="input-group">
                <textarea cols="50" rows="3" name="description"><?php echo $description ?></textarea>
                </div>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Short Description</p>
                <div class="input-group">
                <textarea cols="50" rows="3" name="short"><?php echo $short ?></textarea>
                </div>
                <div class="input-group">
                <input type="file" name="image" value=<?php echo $files?>>
                </div>

                <div class="input-group">
                <button type="submit" name ="update" class="btn">UPDATE</button>
                </div>
        </form>
<?php

    }}
    ?>
       <script src="css/js/nav_responsive.js"></script>
       <?php include('footer.php');?>
        </body>
    </html>