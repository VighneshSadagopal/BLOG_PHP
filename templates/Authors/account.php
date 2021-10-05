<?php 

include '../classes/autoload.php';


    $obj = new Users();

    $id=$_GET['id'];
    session_start();


  if ($_SESSION['id'] !==  $id){
        header("Location: ../login/login.php");
    } 


$sql = $obj -> getUserById($id);
      
foreach ($sql as $res) {
    $author=$res['username'];
    $email=$res['email'];
    $dob=$res['dob'];
    $your=$res['your'];
    $image = $res['profilepic']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../css/style.css">  
    <link rel="stylesheet" href="../../css/footer.css">  
    <link rel="stylesheet" href="../../css/nav.css">  
    <link rel="stylesheet" href="../../css/details.css">  
    
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
</head>
<body>
<?php include '../headers/nav.php'; ?>
<div class="right">
                    <img src="../../images/<?php echo $image ?>" id =" clipped" class="extra">
                    <li><a href="#" id="name"><?php echo $_SESSION['username'] ?>&nbsp;<i class="fas fa-caret-down"></i></a>
                        <ul>

                            <li><?php echo "<a href=\"account.php?id=$res[id]\">" ?>Details</a></li>
                            <li><?php echo "<a href=\"mypost.php?id=$res[id]\">" ?>MyPost</a></li>
                            <li><a href="../Post/category.php">Category</a></li>
                            <li><a href="../login/logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;Logout</a></li>
                        </ul>
                    </li>
                </div>

                </ul>
                <div class="icon menu-btn">
                    <i class="fas fa-bars"></i>

                </div>
             
            </div>
            </div>
            </div>
   
    <div class="center">
        <div class="top">
        <div class="img_content">
            <img src = "../../images/<?php echo $image ?> ">
        </div>
        <div class="info">
            <form action="post">
              <input type="text" value="Name  :  <?php echo $author ?>" readonly>
              <input type="text" value="Email  :  <?php echo $email ?> "readonly>
              <input type="date" value="DOB  : <?php echo $dob ?>" readonly>
            </form>
        </div>
        </div>
    </div>
       
        <script src="../../css/js/nav_responsive.js"></script>
        <?php
}
?> 
</body>
</html>