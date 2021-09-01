<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$id = $_SESSION['id'];

if (isset($_POST['submit'])) {



  if (!empty($_POST['author']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['short'])) {
    $imgname = $_FILES['image']['name'];

    $tempname = $_FILES['image']['tmp_name'];
    move_uploaded_file($tempname, "images/$imgname");

    $author = $_POST['author'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $short = $_POST['short'];
    $category = $_POST['category'];


    $query_run = mysqli_query($conn, "INSERT into post(author, title , description , short,id,images,category) VALUES('$author','$title','$description','$short','$id','$imgname','$category')");


    if ($query_run) {
      echo "<script>alert('Form Submitted Successfully.')</script>";
    } else {
      echo  "<script>alert('Form not submitted.')</script>";

      $author = "";
      $title = "";
      $description = "";
      $short = "";
    }
  } else {
    echo "<small> ALL Fields Are Required</small>";
  }
}



$sql = mysqli_query($conn, "SELECT * from users where id='$id' ");

if ($sql->num_rows > 0) {

  while ($row = mysqli_fetch_array($sql)) {


?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
      <link rel="stylesheet" href="scss/index.css">
      <link rel="stylesheet" href="scss/nav.css">
      <link rel="stylesheet" href="css/footer.css">


      <meta charset="UTF-8">
      <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Create Post</title>
    </head>

    <body>
      <?php include('nav.php'); ?>

      <div class="right">
        <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
          <ul>

            <li><?php echo "<a href=\"account.php?id=$row[id]\">" ?>My Details</a></li>
            <li><a href="login.php">Dashboard</a></li>
            <li><?php echo "<a href=\"mypost.php?id=$row[id]\">" ?>My Post</a></li>
            <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a></li>
          </ul>
        </li>
      </div>

      </ul>
      <div class="icon menu-btn">
        <i class="fas fa-bars"></i>

      </div>
      <div>
        <!-- <input type="checkbox" class="checkbox" id="chk" />
        <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="ball"></div>
        </label>
    </div>-->
      </div>
      </div>
      </div>


      <div class="image">




      </div>
      <div class="contain2">
        <div class="whole">

          <div class="logo">
            <img src="css/images/logo3.png">
            <h2>Visual Select</h2>
          </div>
          <form action="" method="POST" class="form" enctype="multipart/form-data" onsubmit="return validated()">
            <h2>Create Post</h2>
            <input type="text" value=<?php echo $_SESSION['username'] ?> name="author" id="input-field">
            <input type="text" placeholder="Title Name" name="title" id="input-field">
            <input type="file" name="image" value="choose image" id="file"><br>
            <select id="category" name="category">
              <option disabled selected>Select Type for your blog</option>
              <option value="social">Social</option>
              <option value="cooking">Cooking</option>
              <option value="food">Food</option>
              <option value="gaming">Gaming</option>
              <option value="gaming">Travel</option>
              <option value="gaming">Sports</option>

            </select>
            <textarea id="txt" cols="30" rows="4" name="description" id="input-field"></textarea>
            <textarea id="txt" cols="30" rows="3" name="short" id="input-field"></textarea>

            <button type="submit" name="submit" class="btn">SUBMIT</button>





          </form>

        </div>
      </div>
  <?php }
}
include('footer.php'); ?>
  <script src="javascript" href="css/js/login.js"></script>
    </body>

    </html>