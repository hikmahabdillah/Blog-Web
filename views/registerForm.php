<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="./register.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="username">Username:</label>
        <input type="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
        <span>Already have an account?</span><a href="./login.php"> Login</a>
    </form>
</body>
</html>