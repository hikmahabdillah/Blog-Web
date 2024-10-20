<?php
require_once './functions/auth.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <?php
  if (isUserLoggedIn()) {
    $username = $_SESSION['username'];
    echo "Welcome, $username";
    echo "<br><a href='logout.php'>Logout</a>";
  } else {
    echo "<a href='login.php'>Login</a>";
  }
  echo "Ini Blogs";
  ?>
</body>

</html>