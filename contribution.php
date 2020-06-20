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

      <h2>contributed by</h2>
   
      <?php 
      	$query3 = "SELECT * from contributors where post_id = '$post_id'";
      	$result3 = mysqli_query($conn,$query3);
      	if(mysqli_num_rows($result3)){
      		while($row = mysqli_fetch_array($result3)){
      			
				$contributed_by = $row['c_name'];
				?>
      			<div class="panel-footer">
              	<a href="profile.php?name=<?php echo $row['c_name']; ?>"><h4><?php echo $contributed_by; ?></h4></a>
              	
             
            	</div>
            	<?php 
      		}
      	}
      	else{?>
      		<div class="panel-footer">
              <h4><?php echo "No likes yet"; ?></h4>
            </div>
		<?php
      	}
      ?>
	  	    		

  </div>
