<?php

include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
$author=$_SESSION['username'];

$query="SELECT * FROM post where author='$author'ORDER BY pid DESC";
$query_run= mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Homepage</title>
        <link rel="stylesheet" href="css/style1.css">
        <link rel="stylesheet" href="css/footer.css">  
        <script src="https://kit.fontawesome.com/ec41712638.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <nav>
            <img src="css/images/logo2.png" class="logo">
            <ul>
                <li><a href="homepage.php" class="active">HOME</a></li>
                <li><a href="login.php">DASHBOARD</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
                
            </ul>
        </nav>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <table border ="2">
            <tr>
                <th>AUTHOR</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>SHORT</th>
                <th>DELETE</th>
            </tr>

        <?php
        while( $res = mysqli_fetch_array($query_run)){

            echo'<tr>';
            echo '<td>'.$res['author'].'</td>' ;
            echo '<td>'.$res['title'].'</td>' ;
            echo '<td>'.$res['description'].'</td>'; 
            echo '<td>'.$res['short'].'</td>' ;
            echo "<td><a href=\"delete.php?pid=$res[pid]\"><input type='submit' value='DELETE'</a>" ;
            echo '</tr>';
        }
        ?>
        
        </table>
        <script src="css/js/nav_responsive.js"></script>
        <?php include('footer.php');?>
    </body>
    </html>