<form method="post">
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

    $p = new Post;
    $sql = $p->getAllPostByCategory($category);

    foreach ($sql as $row) {
      $image = $row['images'];

  ?>

      <div class="container">
        <div id="zoom">
          <img src="../../images/1630508748052.png" id="tag" disabled>
          <p id="category"><?php echo $row['category'] ?> </p>
          <img src="../../images/<?php echo $image ?>">
          <h1><?php echo $row['title'] ?></h1><br><br>
          <p><?php echo $row['short'] ?> </p>
          <p id="read"><?php echo "<a href=\"seperate1.php?pid=$row[pid]\">" ?>Read more</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $row['author'] ?></span></p>
        </div>
      </div>

    <?php
    }
  } else {
    $p = new Post;
    $sql = $p->getAllPost();

    foreach ($sql as $row) {
      $image = $row['images'];

    ?>

      <div class="container">
        <img src="../../images/1630508748052.png" id="tag" disabled>
        <p id="category"><?php echo $row['category'] ?> </p>
        <img src="../../images/<?php echo $image ?>">
        <h1><?php echo $row['title'] ?></h1><br><br>
        <p><?php echo $row['short'] ?> </p>
        <p id="read"><?php echo "<a href=\"seperate1.php?pid=$row[pid]\">" ?>Read more</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>~<?php echo $row['author'] ?></span></p>

      </div>

  <?php

    }
  }



  ?>




  <?php include('../headers/footer.php'); ?>
</div>