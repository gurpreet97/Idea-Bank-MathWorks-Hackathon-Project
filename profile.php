<?php require_once "functions.php"; ?>
<?php include "header.php" ?>

<?php
  check_auth();
  db_connect();
  $user = $_GET['name'];
  $loggedin = $_SESSION['name'];
  
  $sql = "SELECT * FROM user WHERE name = '$user' ";

  $result = mysqli_query($conn,$sql);

  $row = mysqli_fetch_array($result);
  $MWpoints = $row['MWpoints'];


  $query1 = "SELECT sum(contribution) as inv from contributors where c_name = '$user'";
  $result1 = mysqli_query($conn,$query1);
  $result = mysqli_fetch_array($result1);
  $inv = $result['inv'];

  $status = "In progress";
  $query1 = "SELECT count(*) as project_in_progress from post where name = '$user' and current_status = '$status'";
  $result1 = mysqli_query($conn,$query1);
  $result = mysqli_fetch_array($result1);
  $project_in_progress = $result['project_in_progress'];
  


  $status = "Idea proposed";
  $query1 = "SELECT count(*) as project_proposed from post where name = '$user' and current_status = '$status'";
  $result1 = mysqli_query($conn,$query1);
  $result = mysqli_fetch_array($result1);
  $project_proposed = $result['project_proposed'];



  $status = "Completed";
  $query1 = "SELECT count(*) as project_completed from post where name = '$user' and current_status = '$status'";
  $result1 = mysqli_query($conn,$query1);
  $result = mysqli_fetch_array($result1);
  $project_completed = $result['project_completed'];

 // COMMENT

  // $sql = "SELECT * FROM post where current_status = 'Idea proposed' and type = 'idea' and name = '$user'";
  // $sql2 = "SELECT * FROM post where current_status = 'In progress' and type = 'idea'  and name = '$user'";
  // $sql3 = "SELECT * FROM post where current_status = 'Completed' and type = 'idea' and name = '$user'";
  // $sql4 = "SELECT * FROM post where current_status = 'Idea proposed' and type = 'problem' and name = '$user'";
  // $sql5 = "SELECT * FROM post where current_status = 'In progress' and type = 'problem' and name = '$user'";
  // $sql6 = "SELECT * FROM post where current_status = 'Completed' and type = 'problem' and name = '$user'";
  // $result = $conn->query($sql);
  // $result2 = $conn->query($sql2);
  // $result3 = $conn->query($sql3);
  // $result4 = $conn->query($sql4);
  // $result5 = $conn->query($sql5);
  // $result6 = $conn->query($sql6);
  // $pwd = getcwd();

  // $cmd = '"C:\Program Files\MATLAB\R2020a\bin\matlab.exe" -automation -sd ' . $pwd . ' -r "chart(' .$result->num_rows .','.$result2->num_rows.','.$result3->num_rows .',' .$result4->num_rows .','. $result5->num_rows .','. $result6->num_rows .');exit" -wait -logfile log.txt';
  // // exec
  // $last_line = exec($cmd, $output, $retval);

 // COMMENT

?>

<!-- main -->
<!-- <main class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>STATS</h4>
            <img src="main.png" alt="Girl in a jacket" width="300" height="300"/><br>;
            <img src="idea.png" alt="Girl in a jacket" width="400" height="400"/><br>;
            <img src="problem.png" alt="Girl in a jacket" width="400" height="400"/><br>;
        </div>
      </div> -->

<main class="container">
<style>
  .centerI {
   
  }
</style>
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">

          <h3 style = "text-align: center;"><b>Statistics</b></h3>
            <div style = "display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <img 
              src="main.png" 
              alt="pie chart" width="400" height="320" class = "centerI"
              /><br>;
              Legend 1
            </div>
            <div style = "display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <img src="idea.png" alt="pie chart" width="400" height="320" class = "centerI"/><br>
            Legend 2
            </div>
            <div style = "display: flex; flex-direction: column; align-items: center; justify-content: center;">
            <img src="problem.png" alt="pie chart" width="400" height="320" class = "centerI"/><br>
            Legend 3
            </div>
        </div>
      </div>

      <!-- story -->

      

        <!-- /story -->

    </div>
    <div class="col-md-6">
      <!-- user profile -->
      <div class="media">
         <div class="panel-footer">
        <div class="media-left">
          <img src="img/my_avatar.png" class="media-object" style="width: 128px; height: 128px;">
        </div>
       
        <div class="media-body">
          <h2 class="media-heading"><?php echo $user; ?></h2>
          <p>MWpoints: <?php echo $MWpoints; ?> </p>
          
          <p>Invested MWpoints: <?php echo $inv; ?> </p>
          
          <p>Projects in progress: <?php echo $project_in_progress; ?> </p>
          
          <p>Projects proposed: <?php echo $project_proposed; ?> </p>

          <p>Projects completed: <?php echo $project_completed; ?> </p>
          <br>
        </div>
      </div>
      </div>
      <!-- user profile -->

      <hr>

      <h2 style="margin-left: 40%">Timeline</h2>

      <!-- timeline -->
      <div>
        <!-- post -->
        <?php 
          $sql = "SELECT * from post where name = '$user' order by post_creation_time desc ";

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
      <!-- ./timeline -->
    </div>
    <div class="col-md-3">
      <!-- friends -->
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Friends</h4>
          <?php 
            $sql = "SELECT friend_name FROM have_friend WHERE name = '$user'";
            $result = mysqli_query($conn,$sql);


            if (mysqli_num_rows($result) > 0) { ?>
              <ul>
                <?php
                  while($friend = $result->fetch_assoc()) { ?>
                    <li>
                     
                      <a href="profile.php?name=<?php echo $friend['friend_name']; ?>"><?php echo $friend['friend_name']; ?></a> 
                      <?php if($loggedin==$user) { ?>

                          <a class="text-danger" href="remove-friend.php?uname=<?php echo $friend['friend_name']; ?>">[unfriend]</a>
                          <?php  
                            $link = "chat.php?fname=".$friend['friend_name'];
                            // echo $link; 
                          ?>
                           
                          <a class="text-danger" href="<?php echo $link; ?>">[chat]</a>

                      <?php } ?>
                    </li>
                <?php } ?>
              </ul>
            <?php } else { ?>
              <p class="text-center">No friends</p>
            <?php } ?>
        </div>
      </div>
      <!-- ./friends -->
    </div>


     <div class="col-md-3">
      <!-- friends -->
      <div class="panel panel-default">
        <div class="panel-body">
          <h4>Liked Pages</h4>
          <?php 
            $sql = "SELECT pname FROM user_like_page WHERE name = '$user'";
            $result = mysqli_query($conn,$sql);


            if (mysqli_num_rows($result) > 0) { ?>
              <ul>
                <?php
                  while($lpage = $result->fetch_assoc()) { ?>
                    <li>
                     
                      <a href="page_profile.php?pname=<?php echo $lpage['pname']; ?>"><?php echo $lpage['pname']; ?></a> 
                      <?php if($loggedin==$user) { ?>

                          <a class="text-danger" href="like_page.php?pname=<?php echo $lpage['pname']; ?>">[unlike]</a>
                           <?php  
                            $link = "group_chat.php?pname=".$lpage['pname'];
                            // echo $link; 
                          ?>
                           
                          <a class="text-danger" href="<?php echo $link; ?>">[chat]</a>

                      <?php } ?>
                    </li>
                <?php } ?>
              </ul>
            <?php } else { ?>
              <p class="text-center">No liked pages</p>
            <?php } ?>
        </div>
      </div>
      <!-- ./friends -->
    </div>
  </div>
</main>
<!-- ./main -->

<?php include "footer.php" ?>



