<?php 

include '../classes/autoload.php';



session_start();

if (isset($_SESSION['username'])){
   $id=$_SESSION['id'];
   $image = $_SESSION['profilepic'];
}
else{
    header("Location: ../login/login.php");
}

if (isset($_REQUEST['info'])) {
    if ($_REQUEST['info'] == "deleted") {
        echo "<div id='alert'><small1>Successfully Deleted&nbsp;&nbsp;&nbsp;</small1></div>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../css/author.css">  
    <link rel="stylesheet" href="../../css/nav.css">  
    <link rel="stylesheet" href="../../css/footer.css"> 
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
 
</head>
<body vlink =" black">
<div class="image">
         <h1>UPDATE POST</h1>
         <a href="#tab" id="bb">Lets GO</a>
<?php include('../headers/nav.php');?>
        
     
        <div class="right">
        <img src="../../images/<?php echo $image ?>" id =" clipped" class="extra">
        <li><a href="#" id="name" ><?php echo $_SESSION['username']?>&nbsp;<i class="tiny material-icons" >arrow_drop_down_circle</i></a>
            <ul>
               <li><a href="../login/login.php">Dashboard</a></li>
                <li><a href="../login/logout.php"><i class="tiny material-icons" >power_settings_new</i>&nbsp;LOGOUT</a></li>
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
$post = new Post;
if ($_SESSION['usertype'] == 'admin'){
$sql = $post->getAllPost();

if($post->rowCount() > 0)
{


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
     foreach($sql as $row){

            echo'<tr>';
            echo '<td>'.$row['pid'].'</td>' ;
            echo '<td>'.$row['author'].'</td>' ;
            echo '<td>'.$row['title'].'</td>' ;
            echo "<td><a href=\"edit.php?pid=$row[pid]\"><input type='submit' value='Edit'</a>" ;
            echo "<td><a href=\"delete.php?pid=$row[pid]\"><input type='submit' value='DELETE'</a>" ;
            echo '</tr>';
        }
      }
        ?>
        </table>
    
       
      
        </div>
        <?php 
        }else{
            $sql = $post->getPostById($id);

if($post->rowCount() > 0)
{


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
     foreach($sql as $row){

            echo'<tr>';
            echo '<td>'.$row['pid'].'</td>' ;
            echo '<td>'.$row['author'].'</td>' ;
            echo '<td>'.$row['title'].'</td>' ;
            echo "<td><a href=\"edit.php?pid=$row[pid]\"><input type='submit' value='Edit'</a>" ;
            echo "<td><a href=\"delete.php?pid=$row[pid]\"><input type='submit' value='DELETE'</a>" ;
            echo '</tr>';
        }
      }
        ?>
        </table>
        <?php
        }

        ?>
    

<?php include('../headers/footer.php'); ?>
        <script src="../../css/js/index.js"></script>
        

</body>
</html>