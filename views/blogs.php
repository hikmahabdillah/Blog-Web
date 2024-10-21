<?php
require_once './functions/auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MindPost | Blog Web App</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <?php include './views/navbar.php'?>
  <div class="" style="height:1000px"></div>
  <p>test</p>
  <?php
    if(isUserLoggedIn()){
      echo "<a href='logout.php'>Logout</a>";
    }
  ?>
</body>

</html>