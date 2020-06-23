<?php 

	require_once "header.php";
	require_once "functions.php";
	db_connect();

	$post_id = $_GET['post_id'];
	$user  = $_SESSION['name'];

?>

<div class="col-md-6" style="margin-left: 25%;">

<div>
        <!-- post -->
        <?php 
          $sql = "SELECT * from post where post_id = '$post_id'";

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
            <span class="label label-primary"><?php echo $type ?></span>
              <span><?php echo $creation_type; ?> on <?php echo $post['post_creation_time']; ?> by <?php echo $post['name']; ?></span> 
            </div>
            <div class="panel-body">
              <h3><?php echo $post['post_heading']; ?></h3>
              <p><?php echo $post['post_text']; ?></p>
               
            </div>
           <div class="panel-footer" style = "height: 50px;">


              <?php
                if($type == 'idea'){
                 $contribution = "contribution.php?post_id=".$post_id;
               ?>

               <span class="pull-left"><a class="text-primary" style = "padding: 5px" href="<?php echo $contribution; ?>">  
                <?php 
                  echo $MWpoints['contr']." MWpoints";}
                ?>
                </a></span>
                <span class="pull-left"><a class="text-secondary" style="padding: 5px" href=<?php echo "comment.php?post_id=" . $post_id; ?>> Comment
                      <span class="badge"><?php
                                          echo $num_comm['comments'];
                                          ?> </span>
                    </a></span>
               
               <?php 

                     // $link1 = "post_creation.php?post_id=".$post['post_id']."&privacy=".$privacy."&creation_type=Shared";

                     // $link2 = "delete-post.php?post_id=".$post['post_id'];

                      // $link3 = "post_creation.php?post_id=".$post['post_id']."&privacy=".$privacy."&creation_type=Posted";

                       if($_SESSION['name'] != "") {
               
                        if($type == 'idea'){
                          if($post['name']==$user){
                          ?>
                             <span class="pull-right"><a class="text-secondary" style = "padding: 5px" href="<?php echo "status.php?post_id=".$post_id; ?>"> <?php echo $post['current_status'];?>
                             </a></span>
                         
                       <?php } else {?>
           
                          
                         <span class="pull-right"><a class="text-secondary" style = "padding: 5px" > <?php echo $post['current_status'];?>
                             </a></span>
                       
                             
                        
           
                       <?php }} ?>


              <span class="pull-right">
                <?php  
                  $query5 = "SELECT * from contributors where post_id = '$post_id' and c_name = '$user' ";

                  $result5 = mysqli_query($conn,$query5);
                  $q6 = "select current_status from post where post_id = '$post_id'";
                  $r6 = mysqli_query($conn,$q6);
                  $rr6 = $r6->fetch_assoc();
                  $rrr = $rr6['current_status'];
                  $result5 = mysqli_query($conn,$query5);
                  if((mysqli_num_rows($result5)==0 && $rrr == 'In progress') | $type == 'problem'){

                  }
                  else if(mysqli_num_rows($result5)==0){
                    ?>
                    <a class="text-primary" style = "padding: 5px" href= <?php     echo "contribute_post.php?post_id=".$post_id; ?> >
                    <?php
                   echo 'Contribute(10 MWpoints)';
                   ?>
                   </a>
                   <?php
                  }
                  else{
                    echo 'Already contributed';
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
      <?php
       if($_SESSION['name'] != "") {
        ?>

      <div class="panel-body">
             <!-- comment form -->
      <form method="post" action="create_comment.php?post_id=<?php echo $post_id;  ?>" >
        <div class="input-group">
          <input class="form-control" type="text" name="content" placeholder="Make a Comment..." required>
          <span class="input-group-btn">
            <button class="btn btn-success" type="submit" name="comment">Comment</button>
          </span>
        </div>
      </form><hr>
      <!-- ./comment form -->
    </div>

    <?php } ?>
      <?php 
      	$query3 = "SELECT * from comment where post_id = '$post_id'";
      	$result3 = mysqli_query($conn,$query3);
      	if(mysqli_num_rows($result3)){
      		while($row = mysqli_fetch_array($result3)){
      			$comment_content = $row['comment_content'];
				$commenter = $row['name'];
				?>
      			<div class="panel-footer">
              	<h4><?php echo $commenter; ?></h4>
              	<p><?php echo $comment_content; ?></p>
             
            	</div>
            	<?php 
      		}
      	}
      	else{?>
      		<div class="panel-footer">
              <h4><?php echo "No Comments yet"; ?></h4>
            </div>
		<?php
      	}
      ?>
	  	    		

  </div>
