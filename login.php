<?php
require_once './functions/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (loginUser($email, $password)) {
        header("Location: ./");
        exit;
    } else {
        $error = "Email or Password is incorrect!";
        include './views/loginForm.php';
    }
}else if(isUserLoggedIn()){
  header("Location: ./");
} else {
  include './views/loginForm.php';
}
