<form method="post" >
                <select id="search" name="category">
                    <option value="">Search By Category</option>
                    <option value="social">Social</option>
                    <option value="anime">Anime</option>
                    <option value="food">Food</option>
                    <option value="gaming">Gaming</option>
                    <option value="travel">Travel</option>
                    <option value="sports">Sports</option>
                </select>
                <button type="submit" name="show" id="show"><i class="fas fa-search"></i></button>
            </form>
<div class="post" id="post">


  <?php
  $category = "";
  if (isset($_POST['show'])) {
    $category = $_POST['category'];
  }
  if (!$category == "") {


    $query1 = "SELECT * FROM post WHERE category='$category' ORDER BY pid DESC";
    $query_run = mysqli_query($conn, $query1);
    $check_post = mysqli_num_rows($query_run) > 0;

    if ($check_post) {
      while ($res = mysqli_fetch_array($query_run)) {
        $image = $res['images'];

  ?>


        <div class="container">
        <img src="images/1630508748052.png" id="tag" disabled>
        <p id="category"><?php echo $res['category'] ?> </p>
          <img src="images/<?php echo $image ?>">
          <h1><?php echo $res['title'] ?></h1><br><br>
          <p><?php echo $res['short'] ?> </p>
          <p id="read"><?php echo "<a href=\"seperate1.php?pid=$res[pid]\">" ?>Read more...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $res['author'] ?></span></p>
        </div>

      <?php

      }
    }
  } else {
    $query1 = "SELECT * FROM post ORDER BY pid DESC";
    $query_run = mysqli_query($conn, $query1);
    $check_post = mysqli_num_rows($query_run) > 0;

    if ($check_post) {
      while ($res = mysqli_fetch_array($query_run)) {
        $image = $res['images'];

      ?>


        <div class="container">
        <img src="images/1630508748052.png" id="tag" disabled>
        <p id="category"><?php echo $res['category'] ?> </p>
          <img src="images/<?php echo $image ?>">
          <h1><?php echo $res['title'] ?></h1><br><br>
          <p><?php echo $res['short'] ?> </p>
          <p id="read"><?php echo "<a href=\"seperate1.php?pid=$res[pid]\">" ?>Read more...</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $res['author'] ?></span></p>
         
        </div>

  <?php

      }
    }
  }


  ?>




  <?php include('footer.php'); ?>
</div>