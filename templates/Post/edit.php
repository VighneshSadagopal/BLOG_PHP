<?php

include('../classes/autoload.php');

session_start();

$p = new Post();


if (!isset($_SESSION['username'])) {
    header("Location: ../login/login.php");
}
$usertype = $_SESSION['usertype'];
$id = $_SESSION['id'];
$author = $_SESSION['username'];
$pid = $_GET['pid'];

if ($usertype == "admin") {
    $sql = $p->getPostById($pid);
}
if ($usertype == "user") {
    $sql = $p->getPostByJoin($pid, $id);
}
$stmt = $p->rowCount();

if ($stmt > 0) {

    foreach ($sql as $row) {



        $files = $row['images'];
        $author = $row['author'];
        $title = $row['title'];
        $description = $row['description'];
        $short = $row['short'];
        $category = $row['category'];
    }
} else {
    echo "<script>alert('LogIn To Your Account.')</script>";
    $author = "";
    $title = "";
    $description = "";
    $short = "";
}



?>
<?php

if (isset($_POST['update'])) {

    $imgname = $_FILES['image']['name'];

    $tempname = $_FILES['image']['tmp_name'];
    move_uploaded_file($tempname,"../../images/$imgname");
    $author = $_POST['author'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $short = $_POST['short'];
    $category = $_POST['category'];

    $data = ['pid' => $pid, 'author' => $author, 'title' => $title, 'description' => $description, 'short' => $short, 'category' => $category, 'id' => $id, 'images' => $imgname];
    $p->updatePost($data);
    if ($p) {
        echo "<small1>Updation Successful</small1> ";
    } else {
        echo "<small2>Woops! Something Wrong Went.</small2>";
    }
}
$user = new Users;
$sql = $user->getUserByName($author);
foreach ($sql as $row) {


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="../../scss/index.css">
        <link rel="stylesheet" href="../../scss/nav.css">
        <link rel="stylesheet" href="../../scss/notify.css">


        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Author Edit</title>
    </head>

    <body>
        <?php include('../headers/nav.php'); ?>

        <div class="right">
            <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
                <ul>

                    <li><?php echo "<a href=\"../Admin/account.php?id=$row[id]\">" ?>My Details</a></li>
                    <li><a href="../login/login.php">Dashboard</a></li>
                    <li><?php echo "<a href=\"../Authors/mypost.php?id=$row[id]\">" ?>My Post</a></li>
                    <li><a href="../login/logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
                </ul>
            </li>
        </div>

        </ul>
        <div class="icon menu-btn">
            <i class="fas fa-bars"></i>

        </div>
        <!-- <div>
        <input type="checkbox" class="checkbox" id="chk" />
        <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="ball"></div>
        </label>
    </div>-->
        </div>
        </div>
        </div>
        <div class="whole">

            <div class="image">



            </div>
            <div class="contain2">

                <?php
                $post = new Post;
                $sql1 = $post->getPostById($pid);


                foreach ($sql1 as $row) {

                    $image = $row['images'];
                ?>

                    <div class="logo">
                        <img src="../../css/images/logo3.png">
                        <h2>Visual Select</h2>
                    </div>
                    <form action="" method="POST" class="form" enctype="multipart/form-data" onsubmit="return validated()">
                        <h3>Author Details</h3>
                        <input type="text" value=<?php echo $row['author'] ?> name="author" id="input-field">
                        <input type="text" placeholder="Title Name" name="title" id="input-field" value=<?php echo $row['title']; ?>>


                        <input type="file" name="image" value="<?php echo $image; ?>" id="file"><br>
                        <select id="category" name="category">
                            <option disabled selected>Select Type for your blog</option>
                            <option value="social">Social</option>
                            <option value="anime">Anime</option>
                            <option value="food">Food</option>
                            <option value="gaming">Gaming</option>
                            <option value="travel">Travel</option>
                            <option value="sports">Sports</option>

                        </select>
                        <textarea id="txt" cols="30" rows="4" name="description" id="input-field"><?php echo $row['description']; ?></textarea>

                        <textarea id="txt" cols="30" rows="3" name="short" id="input-field" maxlength="244"><?php echo $row['short']; ?></textarea>
                        <button type="submit" name="update" class="btn">SUBMIT</button>





                    </form>


            </div>
        </div>
<?php  }
            }
?>
<script src="javascript" href="../../css/js/login.js"></script>
    </body>

    </html>