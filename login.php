<?php
  require_once "functions.php";

  db_connect();

  $name = $_POST["name"];
  $password = $_POST["password"];

  $query1 = "SELECT * FROM user WHERE name = '$name'";

  $result1 = mysqli_query($conn,$query1);

  if(mysqli_num_rows($result1)==1){
    // echo "user\n";
    $sql = "SELECT password from user where name = '$name'";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    $password1 = $row['password'];
    // echo md5($password);
      // echo "\n";
      // echo $password1;
    if($password==$password1){
      $_SESSION['name'] = $name;
      
      redirect_to("home.php");
    }
    else{
      echo "2222222\n";
      redirect_to("index.php?login_error=true");
    } 
  }
  else{
    echo "nothing\n";
    redirect_to("index.php?login_error=true");
  }

 