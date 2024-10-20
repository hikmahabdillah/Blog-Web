<?php
require_once './functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginUser($email, $password)) {
        header("Location: ./");
        exit;
    } else {
        $error = "Email atau password salah!";
        include './views/login.php';
    }
} else {
  include './views/login.php';
}
