<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Register</h2>
    <div id="hasil" style="color: red;"><!--Hasil akan ditampilkan di sini...--></div>
    <form id="formRegister" action="./register.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" name="email" required><br>
        <label for="username">Username:</label>
        <input type="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <button type="submit">Register</button>
        <span>Already have an account?</span><a href="./login.php"> Login</a>
    </form>
    <script>
        $(document).ready(function() {
            $("#formRegister").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman form secara default

                // Mendapatkan data form
                var formData = $(this).serialize();

                // Kirim data ke server PHP
                $.ajax({
                    url: "./register.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = './login.php'; // Redirect ke halaman utama
                        } else {
                            $("#hasil").html(response.message);
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
