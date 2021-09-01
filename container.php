<div class="post" id ="post">
            
            <?php
                    
              $query = "SELECT * FROM post ORDER BY pid DESC";
              $query_run= mysqli_query($conn, $query);
              $check_post= mysqli_num_rows($query_run) > 0;

              if($check_post)
              {
                while($res = mysqli_fetch_array($query_run))
                {
                  $image=$res['images'];

            ?>


          <div class="container">
            <img src="images/<?php echo $image?>">
            <h1><?php echo $res['title'] ?></h1><br><br>
            <p><?php echo $res['short'] ?> </p>
            <p id="read"><?php echo "<a href=\"seperate.php?pid=$res[pid]\">"?>Read more...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $res['author'] ?></span></p>
          </div>

            <?php
              }
              }
              else{
                  echo " NO POST FOUND";
              }


            ?>
          
          <?php include('footer.php');?>
        </div>