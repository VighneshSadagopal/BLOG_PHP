<div class="dash_post view" id="post">


  <?php
  $p = new Post;


  if ($category) {
   
      $sql1 = $p->getAllPostByCategory($category);
     
  }else{
      $sql = $p->getAllPost();
      $count = $p->rowCount();
      $per_page = 8;
      $nom_of_pages = ceil($count / $per_page);
      $start = ($page - 1) * $per_page;
  
      $sql1 = $p->getPerPost($start, $per_page);
  }
   

    foreach ($sql1 as $row) {
      $image = $row['images'];
      $short = substr($row['description'], 0, 255);
      $desc = trim($short, ("/\r|\n/"));

  ?>


<div class="container">
        <div id="zoom">
          <span1><i class="fas fa-circle"></i><?php echo $row['category'] ?> </span1>

          <img src="../../images/<?php echo $image ?>">

          <div class="content">
            <h1><?php echo $row['title'] ?></h1><br><br>
            <p><?php echo $desc ?> </p>
            <div class="authread">
              <p id="read"><?php echo "<a href=\"../Post/seperate1.php?pid=$row[pid]\">" ?>Read more</a></p>
                <span>~<?php echo $row['author'] ?></span>
            </div>
          </div>
        </div>
      </div>


    <?php
    }
  
     if (!$category) {
         ?>
    <ul class="pagination more">

      <?php
      for ($i = 1; $i <= $nom_of_pages; $i++) {
          ?>
        <li <?php
            if ($page == $i) {
                echo "class='active'";
            } ?>><a href="<?php echo $dash ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            
      <?php
      } ?>

    </ul>
    <?php
     }
    ?>

</div>