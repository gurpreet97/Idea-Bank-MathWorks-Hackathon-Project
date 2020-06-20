<?php
  require_once "functions.php";

  db_connect();
  $post_id = $_GET['post_id'];


  $sql = "DELETE FROM post WHERE post_id = '$post_id'";
  

  if (mysqli_query($conn,$sql)) {
    redirect_to("home.php");
  } 
  else {
    echo "Error: " . $conn->error;
  }
