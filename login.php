<?php
require_once './functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Inisialisasi array untuk menampung respons
  $response = [
    'status' => 'error',
    'message' => 'Email or Password is incorrect!'
  ];

  if (loginUser($email, $password)) {
    $response['status'] = 'success';
    $response['message'] = 'Login successful';
  } 
  echo json_encode($response);
  exit;
} else if (isUserLoggedIn()) {
  header("Location: ./");
  exit;
} else {
  include './views/loginForm.php';
}
