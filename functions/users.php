<?php
require_once __DIR__ . "/../config/database.php";

// get data user by id
function getUser($user_id)
{
  $conn = connectDatabase();
  if (!$conn) return null;

  $query = "SELECT * FROM Users WHERE user_id = '$user_id'";
  $stmt = $conn->query($query);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateProfile($user_id, $username, $email, $profile_picture)
{
  $conn = connectDatabase();
  if (!$conn) return false;
  // Cek apakah email atau username sudah terdaftar
  $query = "SELECT * FROM Users WHERE (email = '$email' OR username = '$username') AND user_id != '$user_id'";
  $stmt = $conn->query($query);

  if ($stmt->fetch(PDO::FETCH_ASSOC)) {
    return false; // Email / username sudah digunakan
  }

  // Cek apakah file diunggah
  if ($profile_picture['error'] === UPLOAD_ERR_OK) {
    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    if (!in_array($profile_picture['type'], $allowedTypes)) {
      return false; // Format tidak diterima
    }

    // Memindahkan file ke direktori yang sesuai
    $targetDirectory = './assets/profile-img/';
    $fileName = basename($profile_picture['name']);
    $targetFilePath = $targetDirectory . $fileName;

    if (!move_uploaded_file($profile_picture['tmp_name'], $targetFilePath)) {
      return false; // Gagal memindahkan file
    }

    // Query untuk memperbarui semua data termasuk gambar
    $query = "UPDATE Users SET email = '$email', username = '$username', profile_picture = '$fileName' WHERE user_id = '$user_id'";
  } else {
    // Jika file tidak diunggah, perbarui hanya email dan username
    $query = "UPDATE Users SET email = '$email', username = '$username' WHERE user_id = '$user_id'";
  }

  if ($conn->exec($query)) {
    return true;
  } else {
    return false;
  }
}
