<?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])){
   $id=$_SESSION['id'];
}
else{
    header("Location: login1.php");
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="css/author.css">  
    <link rel="stylesheet" href="scss/nav.css">  
    <link rel="stylesheet" href="css/footer.css"> 
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
 
</head>
<body vlink =" black">
<div class="image">
         <h1>UPDATE POST</h1>
         <a href="#tab" id="bb">Lets GO</a>
<?php include('nav.php');?>
        
     
        <div class="right">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="tiny material-icons" >arrow_drop_down_circle</i></a>
            <ul>
               <li><a href="admin.php">Dashboard</a></li>
            <li><a href="createauth.php"> Create New Author</a></li>
                <li><a href="logout.php"><i class="tiny material-icons" >power_settings_new</i>&nbsp;LOGOUT</a></li>
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


<?php
$query=mysqli_query($conn,"SELECT * FROM post ORDER BY pid asc");
if($query->num_rows > 0){


?>

<div class="tab" id="tab">

    <table class="editable" cellspacing="6" cellpadding="50">
      <thead>
            <tr>
            <th>POST ID</th>
                <th>AUTHOR</th>
                <th>TITLE</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
</thead>
  
            <?php
       while($res=mysqli_fetch_array($query)){

            echo'<tr>';
            echo '<td>'.$res['pid'].'</td>' ;
            echo '<td>'.$res['author'].'</td>' ;
            echo '<td>'.$res['title'].'</td>' ;
            echo "<td><a href=\"edit.php?pid=$res[pid]\"><input type='submit' value='Edit'</a>" ;
            echo "<td><a href=\"deletepost.php?pid=$res[pid]\"><input type='submit' value='Delete'</a>" ;
            echo '</tr>';
        }
      }
        ?>
        </table>
    
       
      
        </div>
        <?php include('footer.php')?>

        <script src="css/js/index.js"></script>
        

</body>
</html>