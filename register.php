<?php
require_once './functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (registerUser($email, $username, $password)) {
    echo "Pendaftaran berhasil! Silakan login.";
    header("Location: ./login.php");
    exit;
  } else {
    $error = "Email sudah digunakan atau terjadi kesalahan.";
    include './views/registerForm.php';
  }
} else if (isUserLoggedIn()) {
  header("Location: ./");
} else {
  include './views/registerForm.php';
}
