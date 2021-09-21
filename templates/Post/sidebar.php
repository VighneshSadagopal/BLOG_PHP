<div class="side">
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
        <button type="submit" name="show" id="show" onclick="refreshdiv();"><i class="fas fa-search"></i></button>
      </form>

      <ul>


        <li>
          <h2>Recent Post <i class="fas fa-caret-down"></i></h2>
          <?php
          $sql = $p->getRecent();

          foreach ($sql as $row) {
            $image = $row['images'];
          ?>
            <ul>
              <l1>
                <div class="recent">
                  <div class="container">

                    <img src="images/<?php echo $image ?>">
                    <h1><?php echo $row['title'] ?></h1>
                  </div>
                </div>
              </l1>
            </ul>

          <?php } ?>
        </li>
        <li>
          <h2>Trending Topics<i class="fas fa-caret-down"></i></h2>
        </li>
        <li>
          <h2>Authors <i class="fas fa-caret-down"></i></h2>
        </li>
        <li>
          <h2>Most Liked <i class="fas fa-caret-down"></i></h2>
        </li>

      </ul>

    </div>

  </div>