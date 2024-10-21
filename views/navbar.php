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
      }else{
        echo"<a href='#' class='btn-write'>
        <div>
          <img src='./assets/img/write.png' width='32px' alt=''><span>Write</span>
        </div>
      </a>
      <img class='photo-profile' src='./assets/profile-img/".$_SESSION['profile_picture']."' alt=''>";
      }
      ?>
    </div>
  </nav>
</header>