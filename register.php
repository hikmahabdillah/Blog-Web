<?php
require_once './functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Inisialisasi array untuk menampung respons
  $response = [
    'status' => 'error',
    'message' => 'Email or Username has been used!'
  ];

  if (registerUser($email, $username, $password)) {
    $response['status'] = 'success';
    $response['message'] = 'Register successful';
  } 

  echo json_encode($response);
  exit;
} else if (isUserLoggedIn()) {
  header("Location: ./");
  exit;
} else {
  include './views/registerForm.php';
}
