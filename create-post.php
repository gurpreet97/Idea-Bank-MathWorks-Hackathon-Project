<?php require_once "functions.php"; ?>
<?php include "header.php"; ?>
<?php 
    check_auth();
    db_connect();
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>NeTwoRk BuZz</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <div style = "width: 500px;margin-left : 30%;">
   <h2>Post a Idea/Problem</h2>
      <!-- post form -->
      <form method="post" action="create-post.php" enctype="multipart/form-data">
            <div class="form-group">
              <input class="form-control" type="text" name="heading" placeholder="Heading" value="">
            </div>

            <div class="form-group">
              <input class="form-control" type="text" name="text" placeholder="Text" value="">
            </div>

            <select name = "type">
              <option value = "idea">Idea</option>
              <option value = "problem">Problem</option>
            </select>

            <div class="form-group">
              <input class="btn btn-primary" type="submit" name = "make_post" value="Post">
            </div>
          </form><hr> 
  </div>
   
</body>


<?php  


  if(isset($_POST['make_post'])){
      db_connect();


      $text = $_POST['text'];
      $heading = $_POST['heading'];
      $type = $_POST['type'];

      $user = $_SESSION['name'];
      $creation_time = date("Y-m-d H:i:s");

      $post_id  = bin2hex(random_bytes(40));

      $status = "Idea proposed";

      $sql = "INSERT INTO post VALUES ('$post_id','$user','$status','$creation_time','$text','$type','$heading')";

      if (mysqli_query($conn,$sql)) {
         redirect_to("home.php");
      } else {
        echo "Error: " . $conn->error;
      }

  }
  

?>