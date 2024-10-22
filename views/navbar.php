<header>
  <nav class="navbar">
    <div class="logo">
      <img src="./assets/img/logoParticle.png" alt="MindPost Logo" width="70px">
      <span>MindPost</span>
    </div>
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
        echo "<a href='#' class='btn-write'>
        <div>
          <img src='./assets/img/write.png' width='32px' alt=''><span>Write</span>
        </div>
        </a>
        <div class='circle'>
        <img class='photo-profile' src='./assets/profile-img/" . $_SESSION['profile_picture'] . "' width='50px' alt=''>
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
    <h3>". $_SESSION['username'] ."</h3>
    <p>". $_SESSION['email'] ."</p>
    <hr>
    <div class='menu-item'>
      <img src='./assets/img/UserProfile.svg' width='30px' alt=''> Profile
    </div>
    <div class='menu-item'>
      <img src='./assets/img/Blogs.svg' width='30px' alt=''> Your Blogs
    </div>
    <div class='logout'>
      <a href='logout.php'>Logout</a>
    </div>
  </div>
  ";
  }?>
</header>