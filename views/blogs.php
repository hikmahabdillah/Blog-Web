<?php
require_once './functions/auth.php';

if(isUserLoggedIn()){
  $username = $_SESSION['username'];
  echo "Selamat Datang, $username";
  echo "<a href='logout.php'>Logout</a>";
}else{
  echo "<a href='login.php'>Login</a>";
}
echo "Ini Blogs";
