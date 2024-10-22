<?php
require_once './functions/users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  session_start();
  $userId = $_SESSION['user_id']; 
  $email = $_POST['email'];
  $username = $_POST['username'];
  $profile_picture = $_FILES['photo-upload'];

  if (updateProfile($userId, $username,  $email, $profile_picture)) {
      $successMessage = "Profil berhasil diperbarui!";
      header("Location: ./");
  } else {
      $errorMessage = "Gagal memperbarui profil.";
  }
}