<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="overlay">
        <img src="./assets/img/smillingManGreeting.png" alt="Logo" width="200px" class="illustration"> 
        <div class="box">
            <div>
                <img src="./assets/img/logoParticle.png" alt="Logo" width="80px"> 
            </div>
            <h2>Welcome Back!</h2>
            <p>Log in to your account</p>
            <div id="hasil" style="color: red;"><!--Hasil akan ditampilkan di sini...--></div>
            <form id="formLogin" action="./login.php" class="form" method="POST">
                <div class="input-group">

                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" 
                    placeholder="Password"
                    required>
                </div>
                <button type="submit" class="btn btn-black">Login</button>
            </form>
            <p class="linked-text">Don’t Have Any Account? <a href="./register.php">Register</a></p>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#formLogin").submit(function(e) {
                e.preventDefault(); // Mencegah pengiriman form secara default

                // Mendapatkan data form
                var formData = $(this).serialize();

                // Kirim data ke server PHP
                $.ajax({
                    url: "./login.php",
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = './'; // Redirect ke halaman utama
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