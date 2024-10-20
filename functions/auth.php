<?php
require_once __DIR__ . "/../config/database.php";

// function untuk mengatasi register
function registerUser($email, $username, $password) {
  $conn = connectDatabase();
  if (!$conn) return false;

  // Cek apakah email sudah terdaftar
  $query = "SELECT * FROM Users WHERE email = :email";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->execute();

  if ($stmt->fetch(PDO::FETCH_ASSOC)) {
      return false; // Email sudah digunakan
  }

  // Hash password sebelum menyimpannya di database
  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

  // Masukkan pengguna baru ke database
  $query = "INSERT INTO Users (email, username, password) VALUES (:email, :username, :password)";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':username', $username);
  $stmt->bindParam(':password', $hashedPassword);
  
  if ($stmt->execute()) {
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
    $query = "SELECT * FROM Users WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->execute(); //query akan di jalankan

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
  session_start();
  return isset($_SESSION['user_id']);
}
// jika user belum login maka akan dikembalikan ke halaman login
function checkLogin() {
  if (!isUserLoggedIn()) {
      header("Location: ./login.php");
      exit;
  }
}

// mengatasi logout
function logoutUser() {
  session_start();
  session_unset();
  session_destroy();
  header("Location: ./");
}
