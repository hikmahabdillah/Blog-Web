<?php
require_once './functions/blogs.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  session_start();
  $userId = $_SESSION['user_id']; 
  $title = $_POST['title'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $content = $_POST['content'];
  $image_blog = $_FILES['blog-banner'];

  if (insertBlog($userId, $title,  $category, $description, $content, $image_blog)) {
      $successMessage = "Blog berhasil dibuat";
      header("Location: ./");
  } else {
      $errorMessage = "Gagal membuat blog";
  }
}
