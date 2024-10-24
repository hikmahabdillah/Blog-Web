<?php
require_once __DIR__ . "/../config/database.php";

// get data blogs
function getBlogs()
{
  $conn = connectDatabase();
  if (!$conn) return null;

  // get semua data blog dan get data author
  // sort berdasarkan blog terbaru
  $query = "SELECT blogs.blog_id, 
       blogs.title, 
	     blogs.description,
       blogs.content, 
       blogs.category, 
       blogs.image_blog, 
       blogs.created_at AS blog_created_at, 
       users.username AS author_name, 
       users.profile_picture
  FROM blogs
  JOIN users ON blogs.user_id = users.user_id
  ORDER BY blogs.created_at DESC;";
  $stmt = $conn->query($query);

  $blogs = [];
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $blogs[] = $row;
  }

  return $blogs;
}

// get data blog by id
function getBlogById($idBlog)
{
  $conn = connectDatabase();
  if (!$conn) return null;

  // get satu data blog berdasarkan idblog dan get data author
  $query = "SELECT b.*, u.username AS author_name, u.profile_picture
  FROM blogs b
  JOIN users u ON b.user_id = u.user_id
  WHERE b.blog_id = '$idBlog'";
  $stmt = $conn->query($query);

  $blog = $stmt->fetch(PDO::FETCH_ASSOC);
  return $blog;
}

// function untuk mendapatkan blog apa saja yang telah di buat oleh user
function getBlogByUserId($userId)
{
  $conn = connectDatabase();
  if (!$conn) return null;

  // get semua data blog yang telah dibuat oleh user dan get data author
  // sort berdasarkan blog terbaru
  $query = "SELECT blogs.blog_id, 
       blogs.title, 
	     blogs.description,
       blogs.content, 
       blogs.category, 
       blogs.image_blog, 
       blogs.created_at
  FROM blogs
  JOIN users ON blogs.user_id = users.user_id
  WHERE users.user_id = '$userId'
  ORDER BY blogs.created_at DESC;";

  $stmt = $conn->query($query);

  $blogs = [];
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $blogs[] = $row;
  }

  return $blogs;
}

// function untuk menambahkan blog baru
function insertBlog($user_id, $title, $category, $description, $content, $image_blog)
{
  $conn = connectDatabase();
  if (!$conn) return false;

  // cek apakah file diupload
  if ($image_blog['error'] === UPLOAD_ERR_OK) {
    // type yang diijinkan
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];

    // cek apakah type file dari imageblog tergolong dengan type yang diijinkan
    if (!in_array($image_blog['type'], $allowedTypes)) {
      return false;
    }

    // Memindahkan file ke direktori yang sesuai
    $targetDirectory = './assets/banner-img/';
    $fileName = basename($image_blog['name']);
    $targetFilePath = $targetDirectory . $fileName;

    // Jika pemindahan file gagal, akan mengembalikan false
    if (!move_uploaded_file($image_blog['tmp_name'], $targetFilePath)) {
      return false;
    }

    // Query untuk menambah semua data termasuk gambar
    $query = "INSERT INTO Blogs (user_id, title, category, description, content, image_blog) VALUES ('$user_id', '$title', '$category', '$description','$content', '$fileName')";
  } else {
    // Jika file tidak diunggah, maka akan menambah semua data kecuali gambar
    $query = "INSERT INTO Blogs (user_id, title, category, description, content) VALUES ('$user_id', '$title', '$category', '$description', '$content')";
  }

  if ($conn->exec($query)) {
    return true;
  } else {
    return false;
  }
}

// function untuk delete blog
function deleteBlog($blogId){
  $conn = connectDatabase();
  if (!$conn) return null;

  // delete blog berdasarkan blog id
  $query = "DELETE FROM Blogs WHERE blog_id = '$blogId'";
  $stmt = $conn->query($query);

  if($stmt){
    return true;
  }

  return false;
}