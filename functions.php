<?php
  session_start();

  function db_connect() {
    global $conn; // db connection variable
    $db_server = "localhost";
    $username = "root";
    $password = "";
    $db_name = "idea_bank";

    // create a connection
    $conn = mysqli_connect($db_server, $username, $password, $db_name);

    // check connection for errors
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  }

  function redirect_to($url) {
    header("Location: " . $url);
    
    exit();
  }

  function is_auth() {
    return isset($_SESSION['name']);
  }

  function check_auth() {
    if(!is_auth()) {
      redirect_to("/index.php?logged_in=false");
    }
  }