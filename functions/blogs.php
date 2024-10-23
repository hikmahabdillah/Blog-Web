<?php
require_once __DIR__ . "/../config/database.php";

// get data blogs
function getBlogs()
{
  $conn = connectDatabase();
  if (!$conn) return null;

  $query = "SELECT * FROM Blogs";
  $stmt = $conn->query($query);

  $blogs = [];
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $blogs[] = $row;
  }
  
  return $blogs;
}

// get data blog by id
function getBlogById($idBlog){
  $conn = connectDatabase();
  if (!$conn) return null;

  $query = "SELECT * FROM Blogs WHERE id = '$idBlog'";
  $stmt = $conn->query($query);

  $blog = $stmt->fetch(PDO::FETCH_ASSOC);
    return $blog;
}

function insertBlog($user_id, $title, $category,$content, $image_blog){
  $conn = connectDatabase();
  if (!$conn) return false;

  // cek apakah file diupload
  if ($image_blog['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

    if (!in_array($image_blog['type'], $allowedTypes)) {
      return false; 
    }

    // Memindahkan file ke direktori yang sesuai
    $targetDirectory = './assets/banner-img/';
    $fileName = basename($image_blog['name']);
    $targetFilePath = $targetDirectory . $fileName;
    
    if (!move_uploaded_file($image_blog['tmp_name'], $targetFilePath)) {
      return false; 
    }

    // Query untuk menambah semua data termasuk gambar
    
    $query = "INSERT INTO Blogs (user_id, title, category, content, image_blog) VALUES ('$user_id', '$title', '$category', '$content', '$fileName')";
  }else{
    // Jika file tidak diunggah, maka akan menambah semua data kecuali gambar
    $query = "INSERT INTO Blogs (user_id, title, category, content) VALUES ('$user_id', '$title', '$category', '$content')";
  }

  if ($conn->exec($query)) {
    return true;
  } else {
    return false;
  }
}