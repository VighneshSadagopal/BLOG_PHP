<?php

include "config.php";
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login1.php");
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
        <link rel="stylesheet" href="style1.css">
    </head>
    <body>
    <nav>
            <img src="PicsArt_07-31-02.19.24.png" class="logo">
            <ul>
                <li><a href="homepage.php" class="active">HOME</a></li>
                <li><a href="login.php">DASHBOARD</a></li>
                <li><a href="#">CAREER</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#"><?php echo  $_SESSION['username'] ?>&nbsp;<i class="tiny material-icons">arrow_drop_down_circle</i></a>
                    <ul>
                        <li><a href="account.php">View Details</a></li>
                        <li><a href="logout.php"><i class="tiny material-icons">power_settings_new</i>&nbsp;LOGOUT</a></li>
                    </ul>
                    </li>
                
            </ul>
        </nav>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <table border ="2">
            <tr>
                <th>AUTHOR</th>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>SHORT</th>
                <th>UPDATE</th>
            </tr>

        <?php
        while( $res = mysqli_fetch_array($query_run)){

            echo'<tr>';
            echo '<td>'.$res['author'].'</td>' ;
            echo '<td>'.$res['title'].'</td>' ;
            echo '<td>'.$res['description'].'</td>'; 
            echo '<td>'.$res['short'].'</td>' ;
            echo "<td><a href=\"edit.php?pid=$res[pid]\"><input type='submit' value='EDIT'</a>" ;
            echo '</tr>';
        }
        ?>

        </table>
    </body>
    </html>