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
    <div class="overlay">
        <img src="./assets/img/youngManWaving.png" alt="Logo" width="220px" class="illustration">
        <div class="box">
            <div>
                <img src="./assets/img/logoParticle.png" alt="Logo" width="80px">
            </div>
            <h2>Let's get Started</h2>
            <p>Create your account</p>
            <div id="hasil" style="color: red;"><!--Hasil akan ditampilkan di sini...--></div>
            <form id="formRegister" action="./register.php" method="POST">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="username" name="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-black">Register</button>
            </form>
            <p class="linked-text">Already have an account? <a href="./login.php">Login</a></p>
        </div>
    </div>
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