<?php

include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
$id=$_REQUEST['id'];

if (isset($_POST['submit'])){
 


    if (!empty( $_POST['author']) && !empty($_POST['title']) && !empty($_POST['description']) && !empty( $_POST['short'])){
      $imgname = $_FILES['image']['name'];
    
      $tempname = $_FILES['image']['tmp_name'];
      move_uploaded_file($tempname,"images/$imgname");

 $author= $_POST['author'];
 $title= $_POST['title'] ;
 $description= $_POST['description'] ;
$short = $_POST['short'] ;
    
$query_run=mysqli_query($conn,"INSERT into post(author, title , description , short,id,images) VALUES('$author','$title','$description','$short','$id','$imgname')");


                      if($query_run){ 
                    echo "<script>alert('Form Submitted Successfully.')</script>";                        
                    }
                    else{
                    echo  "<script>alert('Form not submitted.')</script>";
                
                      $author="";
                      $title="";
                      $description="";
                      $short="";
      
                  }
      
                    
                      
                }
                else{
                     echo "<small> ALL Fields Are Required</small>";
                    }
                }

               

                $sql=mysqli_query($conn,"SELECT * from users where id='$id' ");
            
if ($sql->num_rows > 0){

while($row = mysqli_fetch_array($sql))
{

              
?>

 

 <!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/index.css">
   
    
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Edit</title>
</head>
<body>
    

   
        <div class="image">
   
 
        <a href="welcome.php"><i class="fas fa-arrow-circle-left" id="back"></i></a>
        </div>
        <div class ="contain2">
           

            <div class="logo">
                <img src="css/images/logo3.png"><h2>Visual Select</h2>
            </div>
			<form action="" method="POST" class="form" onsubmit="return validated()">
                <h3>Author Details</h3>
                <input type="text" value=<?php echo $_SESSION['username']?> name="author" id="input-field">
                <input type="text" placeholder="Title Name" name="title"  id="input-field">
                <textarea id="txt"cols="30" rows="4" name="description"  id="input-field"></textarea>

                <input type="file" name="image" value="choose image" id="file"><br>

                <textarea id ="txt"cols="30" rows="3"  name="short" id="input-field"></textarea>
                <button type="submit" name ="submit" class="btn">SUBMIT</button>
                    
			

		
            
</form>
            

        </div>
    <?php  }}?>
		<script src="javascript" href="css/js/login.js"></script>
</body>
</html>
    