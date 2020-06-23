<?php require_once "functions.php"; ?>
<?php include "header.php"; ?>

<?php
check_auth();
db_connect();
$user = $_SESSION['name'];
?>

<!-- main -->

<main class="container">
  <!-- messages -->
  <?php if (isset($_GET['request_sent'])) : ?>
    <div class="alert alert-success">
      <p>Friend request sent!</p>
    </div>
  <?php endif; ?>
  <!-- ./messages -->

  <div class="row">
    <div class="col-md-3">
      <!-- Trending Ideas -->
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Trending Ideas</h4>
          <?php
          $sql = "select post.post_heading,post.post_id,contributors.contribution, count(contributors.post_id) from post inner join contributors  on post.post_id = contributors.post_id where post.current_status = 'Idea proposed' AND post.type = 'idea' GROUP BY post_id ORDER BY count(contributors.post_id) desc limit 10";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result)) {
          ?><ul><?php
                while ($f_request = $result->fetch_assoc()) {
                ?>
                <li>
                  <span><a href=<?php echo "comment.php?post_id=" . $f_request['post_id']; ?>><?php echo $f_request['post_heading'] ?></a></span>
                </li>
              <?php
                } ?></ul><?php
                        } else {
                          ?>
            <p class="text-center">No Trending Ideas!</p>
          <?php
                        }
          ?>
        </div>
      </div>
      <!-- ./Trending Ideas -->
    </div>
    <div class="col-md-6 text-center">
      <!-- <h4>Make a post</h4> -->
      <!-- post form -->
      <form method="post" action="create-post.php">
        <div class="form-group">
          <input class="btn btn-primary" type="submit" value="Post an Idea / Problem">
        </div>
      </form>
      <hr>
      <!-- ./post form -->

      <!-- feed -->
      <h2>Home Feed</h2>
      <div class="text-left">
        <!-- post -->
        <?php
        $sql = "SELECT * from post order by post_creation_time desc ";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($post = $result->fetch_assoc()) {
            $post_id = $post['post_id'];
            $query1 = "SELECT sum(contribution) as contr from contributors where post_id = '$post_id'";
            $MWpoints1 = mysqli_query($conn, $query1);
            $MWpoints = mysqli_fetch_array($MWpoints1);

            $query2 = "SELECT count(*) as comments from comment where post_id = '$post_id'";
            $num_comm1 = mysqli_query($conn, $query2);
            $num_comm = mysqli_fetch_array($num_comm1);


            $type = $post['type'];
            $creation_type = "Posted";

        ?>
            <div class="panel panel-default">
              <div class="panel-footer">
                <span class="label label-primary"><?php echo $type ?></span>
                <span><?php echo $creation_type; ?> on <?php echo $post['post_creation_time']; ?> by <b> <?php echo $post['name']; ?> </b></span>
              </div>
              <div class="panel-body">
                <h3><?php echo $post['post_heading']; ?></h3>
                <p><?php echo $post['post_text']; ?></p>

              </div>
              <div class="panel-footer" style="height: 50px;">

                <?php
                if ($type == 'idea') {
                  $contribution = "contribution.php?post_id=" . $post_id;
                ?>

                  <span class="pull-left"><a class="text-primary" style="padding: 5px" href="<?php echo $contribution; ?>">
                    <?php
                    if ($MWpoints['contr'] > 0) {
                      echo $MWpoints['contr'] . " MWpoints";
                    }
                    else{
                      echo "0 MWpoints";
                    }
                    
                  }
                    ?>
                    </a></span>
                  <span class="pull-left"><a class="text-secondary" style="padding: 5px" href=<?php echo "comment.php?post_id=" . $post_id; ?>> Comment
                      <span class="badge"><?php
                                          echo $num_comm['comments'];
                                          ?> </span>
                    </a></span>
                  <?php
                  if ($_SESSION['name'] != "") {
                    if ($type == 'idea') {
                      if ($post['name'] == $user) {
                  ?>
                        <span class="pull-right"><a class="text-primary" style="padding: 5px" href="<?php echo "status.php?post_id=" . $post_id; ?>"> <?php echo $post['current_status']; ?>
                          </a></span>

                      <?php } else { ?>


                        <span class="pull-right"> <a text-primary" style="padding: 5px"> <?php echo $post['current_status']; ?> </a>
                        </span>
                    <?php }
                    } ?>
                    <span class="pull-right mr-1">
                      <?php
                      if ($type == 'idea') {
                        $query5 = "SELECT * from contributors where post_id = '$post_id' and c_name = '$user' ";
                        $q6 = "select current_status from post where post_id = '$post_id'";
                        $r6 = mysqli_query($conn, $q6);
                        $rr6 = $r6->fetch_assoc();
                        $rrr = $rr6['current_status'];
                        $result5 = mysqli_query($conn, $query5);
                        if (mysqli_num_rows($result5) == 0 && $rrr == 'In progress') {
                        } else if (mysqli_num_rows($result5) == 0) { ?>
                          <a class="text-primary" style="padding: 5px" href=<?php echo "contribute_post.php?post_id=" . $post_id; ?>>
                            <?php
                            echo 'Contribute(10 MWpoints)';
                            ?>
                          </a>
                        <?php
                        } else {
                        ?>
                          <span class="text-primary" style="padding: 5px">
                            <?php
                            echo 'Already contributed';
                            ?>
                          </span>
                      <?php
                        }
                      }
                      ?>
                    </span>

                  <?php } ?>

              </div>
            </div>
          <?php
          }
        } else {
          ?>
          <p class="text-center">No posts yet!</p>
        <?php
        }
        ?>
        <!-- ./post -->
      </div>
      <!-- ./feed -->
    </div>
    <div class="col-md-3">
      <!-- add friend -->
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Ongoing Projects</h4>
          <?php

          $sql = "select post_id,post_heading from post where current_status = 'In Progress'";
          $result = mysqli_query($conn, $sql);

          if ($result->num_rows > 0) {
          ?><ul><?php
                while ($af_user = $result->fetch_assoc()) {
                ?>
                <li>
                  <span><a href=<?php echo "comment.php?post_id=" . $af_user['post_id']; ?>><?php echo $af_user['post_heading'] ?></a></span>

                </li>
              <?php
                }
              ?></ul><?php
                    } else {
                      ?>
            <p class="text-center">No Ongoing Projects</p>
          <?php
                    }
          ?>
        </div>
      </div>
      <!-- ./add friend -->
    </div>

    <div class="col-md-3">
      <!-- like page -->
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Completed Projects</h4>
          <?php

          $sql2 = "select post_id,post_heading from post where current_status = 'Completed' ";
          $result2 = mysqli_query($conn, $sql2);

          if ($result2->num_rows > 0) {
          ?><ul><?php
                while ($af_page = $result2->fetch_assoc()) {
                ?>
                <li>
                  <span><a href=<?php echo "comment.php?post_id=" . $af_page['post_id']; ?>><?php echo $af_page['post_heading'] ?></a></span>
                </li>
              <?php
                }
              ?></ul><?php
                    } else {
                      ?>
            <p class="text-center">No projects completed yet!</p>
          <?php
                    }
          ?>
        </div>
      </div>
      <!-- ./like page -->
    </div>
  </div>
</main>
<!-- ./main -->

<?php include "footer.php"; ?>