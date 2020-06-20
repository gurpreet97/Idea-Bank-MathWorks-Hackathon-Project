
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
  <?php if(isset($_GET['request_sent'])): ?>
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
          <!-- <?php 
            $sql = "SELECT sent_by FROM friend_request WHERE sent_to = '$user'";
            $result = mysqli_query($conn,$sql);

            if (mysqli_num_rows($result)) {
              ?><ul><?php
              while($f_request = $result->fetch_assoc()) {
                ?>
                <li>
                  
                  <a href="profile.php?name=<?php echo $f_request['sent_by']; ?>"><?php echo $f_request['sent_by']; ?></a> 
                  <a class="text-success" href="accept-request.php?uname=<?php echo $f_request['sent_by']; ?>">[accept]</a> 
                  <a class="text-danger" href="remove-request.php?uname=<?php echo $f_request['sent_by']; ?>">[decline]</a>
                </li>
                <?php
              } ?></ul><?php
            } else {
              ?>
                <p class="text-center">No friend requests!</p>
              <?php
            }
          ?> -->
        </div>
      </div>
      <!-- ./Trending Ideas -->
    </div>
    <div class="col-md-6">
      <!-- <h4>Make a post</h4> -->
      <!-- post form -->
      <form method="post" action="create-post.php">
            <div class="form-group" style="margin-left: 35%;">
              <input class="btn btn-primary" type="submit" value="Make a Post">
            </div>
          </form><hr>
      <!-- ./post form -->


      <!-- feed -->
      <h2 style="margin-left: 35%">Home Feed</h2>
      <div>
        <!-- post -->
        <?php 
          $sql = "SELECT * from post order by post_creation_time desc ";

          $result = mysqli_query($conn,$sql);

          if (mysqli_num_rows($result) > 0) {
            while($post = $result->fetch_assoc()) {
              $post_id = $post['post_id'];
              $query1 = "SELECT sum(contribution) as contr from contributors where post_id = '$post_id'";
              $MWpoints1 = mysqli_query($conn,$query1);
              $MWpoints = mysqli_fetch_array($MWpoints1);

              $query2 = "SELECT count(*) as comments from comment where post_id = '$post_id'";
              $num_comm1 = mysqli_query($conn,$query2);
              $num_comm = mysqli_fetch_array($num_comm1);


              $type = $post['type'];
              $creation_type = "Posted";

              ?>
                <div class="panel panel-default">
            <div class="panel-footer">
              <span><?php echo $creation_type; ?> on <?php echo $post['post_creation_time']; ?> by <?php echo $post['name']; ?></span> 
            </div>
            <div class="panel-body">
              <h3><?php echo $post['post_heading']; ?></h3>
              <p><?php echo $post['post_text']; ?></p>
              
            </div>
            <div class="panel-footer" style = "height: 50px;">

              <?php
                 $contribution = "contribution.php?post_id=".$post_id;
               ?>

               <span class="pull-left"><a class="text-primary" style = "padding: 5px" href="<?php echo $contribution; ?>">  
                <?php 
                  echo $MWpoints['contr']." MWpoints";
                ?>
                </a></span>
               <span class="pull-left"><a class="text-secondary" style = "padding: 5px" href=<?php     echo "comment.php?post_id=".$post_id; ?>> 
                <?php 
                  echo $num_comm['comments']." Comments";
                ?>  
               </a></span>
               <?php 
                     // $link1 = "post_creation.php?post_id=".$post['post_id']."&privacy=".$privacy."&creation_type=Shared";

                     // $link2 = "delete-post.php?post_id=".$post['post_id'];

                     // $link3 = "post_creation.php?post_id=".$post['post_id']."&privacy=".$privacy."&creation_type=Posted";

                      if($_SESSION['name'] != "") {
               
               if($post['name']==$user){
               ?>

              
            <?php }?>

               <span class="pull-right"><a class="text-secondary" style = "padding: 5px" href="<?php echo $link3; ?>"> <?php echo $post['current_status'];?>
                  </a></span>

            <?php

               if($post['name']!=$user){
            ?>

            

             

            <?php } ?>
              <span class="pull-right"><a class="text-secondary" style = "padding: 5px" href=<?php     echo "comment.php?post_id=".$post_id; ?>>  comment  </a></span>
              <span class="pull-right"><a class="text-primary" style = "padding: 5px" href= <?php     echo "contribute_post.php?post_id=".$post_id; ?> > 
              <?php  
                   $query5 = "SELECT * from contributors where post_id = '$post_id' and c_name = '$user' ";

                  $result5 = mysqli_query($conn,$query5);
                  if(mysqli_num_rows($result5)==0){
                   echo 'Contribute(10 MWpoints)';
                  }
                  else{
                    echo 'Already contributed';
                  }
                ?>   
                </a></span>

              <?php }?>

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
          <h4>add friend</h4>
          <?php 

            $sql = "SELECT user.name from user where name not in (select friend_name from have_friend where have_friend.name = '$user' union select sent_by from friend_request where sent_to = '$user' union select sent_to from friend_request where sent_by = '$user') and user.name != '$user'";

            // $sql = "SELECT id, username, (SELECT COUNT(*) FROM friends WHERE friends.user_id = users.id AND friends.friend_id = {$_SESSION['user_id']}) AS is_friend FROM users WHERE id != {$_SESSION['user_id']} HAVING is_friend = 0";

            $result = mysqli_query($conn,$sql);

            if ($result->num_rows > 0) {
              ?><ul><?php
              while($af_user = $result->fetch_assoc()) {
                ?>
                <li>
                  <a href="profile.php?name=<?php echo $af_user['name']; ?>">
                    <?php echo $af_user['name']; ?>
                  </a> 
                  <a href="add-friend.php?uname=<?php echo $af_user['name']; ?>">[add]</a>
                </li>
                <?php
              }
              ?></ul><?php
            } else {
              ?>
                <p class="text-center">No users to add!</p>
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
          <h4>like page</h4>
          <?php 

            $sql2 = "SELECT pname from page where pname not in (select pname from user_like_page where name = '$user') ";

            // $sql = "SELECT id, username, (SELECT COUNT(*) FROM friends WHERE friends.user_id = users.id AND friends.friend_id = {$_SESSION['user_id']}) AS is_friend FROM users WHERE id != {$_SESSION['user_id']} HAVING is_friend = 0";

            $result2 = mysqli_query($conn,$sql2);

            if ($result2->num_rows > 0) {
              ?><ul><?php
              while($af_page = $result2->fetch_assoc()) {
                ?>
                <li>
                  <a href="page_profile.php?pname=<?php echo $af_page['pname']; ?>">
                    <?php echo $af_page['pname']; ?>
                  </a> 
                  <a href="like_page.php?pname=<?php echo $af_page['pname']; ?>">[like]</a>
                </li>
                <?php
              }
              ?></ul><?php
            } else {
              ?>
                <p class="text-center">No pages to like!</p>
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