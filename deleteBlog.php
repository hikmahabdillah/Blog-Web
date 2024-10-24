<?php
require_once './functions/blogs.php';

// Ambil blog_id dari URL
if (isset($_GET['blog_id'])) {
  $blogId = $_GET['blog_id'];

  $blog = deleteBlog($blogId); 
  if($blog){
    header("Location: ./");
  }
}
?>