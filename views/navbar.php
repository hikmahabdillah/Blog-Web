<?php
require_once './functions/auth.php';
require_once './functions/users.php';
?>
<header>
  <nav class="navbar">
    <a href="./">
      <div class="logo">
        <img src="./assets/img/logoParticle.png" alt="MindPost Logo" width="70px">
        <span>MindPost</span>
      </div>
    </a>
    <div class="nav-buttons">
      <?php
      if (!isUserLoggedIn()) {
        echo "<a href='./login.php'>
        <button class='btn btn-black'>Login</button>
      </a>
      <a href='./register.php'>
        <button class='btn btn-white'>Register</button>
      </a>";
      } else {
        $userId = $_SESSION['user_id'];
        $userData = getUser($userId);
        echo "<a href='./create-blog.php' class='btn-write'>
        <div>
          <img src='./assets/img/write.png' width='32px' alt=''><span>Write</span>
        </div>
        </a>
        <div class='circle'>
        <img class='photo-profile' src='./assets/profile-img/" . $userData['profile_picture'] . "' width='50px' alt=''>
        </div>
        ";
      }
      ?>
    </div>
  </nav>
  <?php
  if(isUserLoggedIn()){
  echo "
  <div class='profile-card'>
    <h3>". $userData['username'] ."</h3>
    <p>". $userData['email'] ."</p>
    <hr>
    <div class='menu-item' id='menu-profile'>
      <img src='./assets/img/UserProfile.svg' width='30px' alt=''> Profile
    </div>
    <div class='menu-item' id='menu-blogUser'>
      <img src='./assets/img/Blogs.svg' width='30px' alt=''> Your Blogs
    </div>
    <div class='logout'>
      <p id='logout-menu'>Logout</p>
    </div>
  </div>
  ";
  }?>
</header>