<?php
require_once './functions/blogs.php';

$blogData = getBlogs();
$latestBlog = $blogData[0];

?>

<div class="container">
  <!-- header title -->
  <div class="heading-title">
    <h1>Read Some Blogs</h1>
    <p class="subtitle">Read some of our latest blogs and stay updated with the trending discussions!</p>
  </div>

  <!-- Main Blog Section -->
  <a href="detail-blog.php?blog_id=<?php echo $latestBlog['blog_id']; ?>" class="blog-link">
  <div class="main-blog" style="background-image: url('./assets/banner-img/<?php echo $latestBlog['image_blog']; ?>');">
    <div class="overlay-background">
      <div class="main-blog-details">
        <div class="title">
          <h2><?php echo $latestBlog['title']; ?></h2>
          <p><?php echo $latestBlog['description']; ?></p>
        </div>
        <div class="author-date">
          <img src="./assets/profile-img/<?php echo $latestBlog['profile_picture']; ?>" alt="Author image" class="author-image">
          <div class="author-info">
            <span class="author-name"><?php echo $latestBlog['author_name']; ?></span>
            <span class="date" id="mainDate"><?php echo date('d M Y', strtotime($latestBlog['blog_created_at'])); ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
</a>

<!-- Smaller Blog Section -->
<div class="grid-group">
  <?php foreach (array_slice($blogData, 1) as $blog) { ?>
  <a href="detail-blog.php?blog_id=<?php echo $blog['blog_id']; ?>" class="blog-link">
    <div class="small-blog">
      <img src="./assets/banner-img/<?php echo $blog['image_blog']?>" class="small-image">
      <div class="small-blog-details">
        <span class="category"><?php echo $blog['category']?> </span>
        <h3><?php echo $blog['title']?></h3>
        <p><?php echo $blog['description']?></p>
        <div class="footer-card">
          <div class="author-date">
            <img src="./assets/profile-img/<?php echo $blog['profile_picture']?>" alt="Author image" class="author-image-small">
            <div class="author-info-small">
              <span class="author-name"><?php echo $blog['author_name']?></span>
              <span class="date" id="smallDate"><?php echo  date('d M Y', strtotime($blog['blog_created_at']))?></span>
            </div>
          </div>
          <div class="read-post">
            <p>Read Post</p>
            <img src="./assets/img/arrow.svg" width="30px" alt="">
          </div>
        </div>
      </div>
    </div>
  </a>
  <?php } ?>
</div>
</div>
</div>