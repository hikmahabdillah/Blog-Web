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
      ?>
        <a href='./login.php'>
        <button class='btn btn-black'>Login</button>
      </a>
      <a href='./register.php'>
        <button class='btn btn-white'>Register</button>
      </a>
      <?php } else {
        $userId = $_SESSION['user_id'];

        // get data user
        $userData = getUser($userId);
      ?>
        <a href='./create-blog.php' class='btn-write'>
        <div>
          <img src='./assets/img/write.png' width='32px' alt=''><span>Write</span>
        </div>
        </a>
        <div class='circle'>
        <img class='photo-profile' src="<?php echo "./assets/profile-img/" . $userData['profile_picture'] . ""?>" width='50px' alt=''>
        </div>
        <?php
      }
      ?>
    </div>
  </nav>
  <?php
  if(isUserLoggedIn()){
  ?>
  <div class='profile-card'>
    <h3><?php echo $userData['username']?></h3>
    <p><?php echo $userData['email']?></p>
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
  <?php }?>
</header>