<?php

include ('config.php');

$pid= $_GET['pid'];

$query=mysqli_query($conn,"SELECT * from post where pid=$pid ");
while($res=mysqli_fetch_array($query)){

    $author=$res['author'];
    $title=$res['title'];
    $description= $res['description'];
    $short= $res['short'];
}
?>
<?php

    if(isset($_POST['update'])){

    
        $author=$_POST['author'];
        $title=$_POST['title'];
        $description=$_POST['description'];
        $short=$_POST['short'];

        $result=mysqli_query($conn,"UPDATE post SET author='$author',title='$title',description='$description',short='$short'where pid='$pid'");
        if($result){
            echo "<script>alert('Successfully Updated.')</script>";
        }
        else{
            echo "<script>alert('updation failed.')</script>";
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="createpost.css">
    </head>
    <body>
        <img src="">
        <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="welcome.php" >DASHBOARD</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
                
            </ul>
        </nav>
        <div class="container">
            <form action="" method="post" class="login-email">
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
                <textarea cols="40" rows="4" name="description"><?php echo $description ?></textarea>
                </div>
                <p class="login-text" style="font-size: 1.5rem; font-weight: 800;">Short Description</p>
                <div class="input-group">
                <textarea cols="40" rows="4" name="short"><?php echo $short ?></textarea>
                </div>
                <div class="input-group">
                <button type="submit" name ="update" class="btn">UPDATE</button>
                </div>
        </form>

        </body>
    </html>