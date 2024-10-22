<?php
require_once __DIR__ . "/../config/database.php";

// function untuk mengatasi register
function registerUser($email, $username, $password) {
  $conn = connectDatabase();
  if (!$conn) return false;

  // Cek apakah email sudah terdaftar
  $query = "SELECT * FROM Users WHERE email = '$email' OR username = '$username'";
  $stmt = $conn->query($query); 

  if ($stmt->fetch(PDO::FETCH_ASSOC)) {
      return false; // Email / username sudah digunakan
  }

  // Hash password sebelum menyimpannya di database
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  // Masukkan new user ke database
  $query = "INSERT INTO Users (email, username, password) VALUES ('$email', '$username', '$hashedPassword')";
  if ($conn->exec($query)) {
      return true; // Pendaftaran berhasil
  } else {
      return false; // Pendaftaran gagal
  }
}

// function untuk mengatasi login
function loginUser($email, $password){
  $conn = connectDatabase();
    if (!$conn) return false;

    // query untuk mendapatkan data user dari email yang diinputkan
    $query = "SELECT * FROM Users WHERE email = '$email'";
    $stmt = $conn->query($query); 

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
     // Verifikasi password
    if ($user && password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['user_id'];
        return true;
    }

    return false;
}

// untuk cek apakah user sudah login
function isUserLoggedIn() {
  // mengecek status session jika session belum di mulai
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  return isset($_SESSION['user_id']);
}

// mengatasi logout
function logoutUser() {
  // mengecek status session jika session belum di mulai
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  session_unset();
  session_destroy();
  header("Location: ./");
}
