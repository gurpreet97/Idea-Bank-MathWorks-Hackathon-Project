<?php require_once "functions.php"; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Idea Bank</title>

  <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <div style = "display: flex; flex-direction: row;">
        <img src = "mw_logo.png" alt = "logo" width = "30" height = "30" style = "margin-right: 10px; position: relative; top: 7px;"/>
        <a class="navbar-brand" href="index.php">Idea Bank</a>
        </div>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <?php if(is_auth()): ?>

          <?php 
            if($_SESSION['name'] != ""){

          ?>
         
          <li><a href="home.php">Home</a></li>
          <li><a href="sample1.php">Statistics</a></li>
          <li><a href="profile.php?name=<?php echo $_SESSION['name']; ?>">Profile</a></li>

        <?php } ?>

          <li><a href="logout.php">Logout</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>
  <!-- ./nav -->