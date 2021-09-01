
    <?php 

include 'config.php';

session_start();

if (isset($_SESSION['username'])){
   $id=$_SESSION['id'];
   $username=$_SESSION['username'];
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
    <link rel="stylesheet" href="css/nav.css">  
    <link rel="stylesheet" href="css/footer.css"> 
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
 
</head>
<body vlink =" black">
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
$query=mysqli_query($conn,"SELECT * FROM policy where status='unchecked'");
if($query->num_rows > 0){


?>
    
<div class="tab" id="tab">

<table class="editable" cellspacing="6" cellpadding="50">
  <thead>
        <tr>
            <th>POLICY ID</th>
            <th>NAME</th>
            <th>APPROVE</th>
            <th>REJECT</th>
        </tr>
</thead>

        <?php
   while($res=mysqli_fetch_array($query)){

        echo'<tr>';
        echo '<td>'.$res['po_id'].'</td>' ;
        echo '<td>'.$res['name'].'</td>' ;
        echo "<td><a href=\"approve.php?id=$res[id]\"><input type='submit' value='APPROVE'</a>" ;
        echo "<td><a href=\"reject.php?id=$res[id]\"><input type='submit' value='REJECT'</a>" ;
        echo '</tr>';
    }
  }else{
      echo "No New Request";
  }
    ?>
    </table>
    
       
   
        </div>
     

     
        

</body>
<?php include('footer.php');?>
</html>