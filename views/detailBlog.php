<?php
require_once './functions/blogs.php';

// Ambil blog_id dari URL
if (isset($_GET['blog_id'])) {
  $blogId = $_GET['blog_id'];

  // Fungsi getBlogById untuk mendapatkan blog berdasarkan ID
  $blog = getBlogById($blogId); // Buat fungsi ini di file `blogs.php`
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $blog['title']; ?></title>
  <link rel="stylesheet" href="./css/styleDetailBlog.css">
  <link rel="stylesheet" href="./css/styleNavbar.css">
  <link rel="stylesheet" href="./css/styleOverlay.css">

</head>

<body>
  <!-- navbar -->
  <?php include './views/navbar.php' ?>

  <div class="container">
    <div class="blog-info">
      <span><?php echo $blog['category']; ?></span>
      <h1><?php echo $blog['title']; ?></h1>
      <p><?php echo $blog['description']; ?></p>
    </div>
    <div class="author-date">
      <img src="./assets/profile-img/<?php echo $blog['profile_picture'] ?>" alt="Author image" class="author-image-small">
      <div class="author-info-small">
        <span class="author-name"><?php echo $blog['author_name'] ?></span>
        <span class="date" id="smallDate"><?php echo  date('d M Y', strtotime($blog['created_at'])) ?></span>
      </div>
    </div>
    <img src="./assets/banner-img/<?php echo $blog['image_blog']; ?>" alt="Blog image" class="blog-image">
    <div class="content">
      <?php echo $blog['content']; ?>
    </div>
  </div>
  <!-- card profile user -->
  <?php include './views/profileUser.php' ?>
  <!-- card blog user -->
  <?php include './views/userBlogModal.php' ?>
  <script src="./js/script.js"></script>
</body>

</html>