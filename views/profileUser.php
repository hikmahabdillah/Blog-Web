<div class="bg-black" id="overlay-profile">
    <div class="box box-white">
        <div>
            <?php
            if (isUserLoggedIn()) {
                $userId = $_SESSION['user_id'];
                $userData = getUser($userId);

                // get data user
                $username = $userData['username'];
                $email = $userData['email'];
                $profilePhoto = './assets/profile-img/' . $userData['profile_picture'];

                ?>
                <div class='minicard-profile'>
                    <div class='circle circle-lg'>
                        <img class='photo-profile' src='<?php echo $profilePhoto; ?>' width='70px' alt=''>
                    </div>
                    <span class='flex-col'>
                        <h3><?php echo $username; ?></h3>
                        <p><?php echo $email; ?></p>
                    </span>
                </div>
                <hr>
                <div id='hasil' style='color: red;'><!--Hasil akan ditampilkan di sini...--></div>
                <form id='updateProfile' action='./updateProfile.php' class='form' method='POST' enctype='multipart/form-data'>
                    <div class='input-group profile-input'>
                        <label for='username'>Username</label>
                        <input type='text' name='username' value='<?php echo $username; ?>' placeholder='Username' required>
                    </div>
                    <div class='input-group profile-input'>
                        <label for='email'>Email</label>
                        <input type='email' name='email' value='<?php echo $email; ?>' placeholder='Email' required>
                    </div>
                    <div class='input-group profile-input'>
                        <label for='photo-upload'>Photo</label>
                        <input type='file' id='photo-upload' name='photo-upload' class='file-input' accept='image/*'>
                        <div class='circle'>
                            <img class='photo-profile' src='<?php echo $profilePhoto; ?>' width='50px' alt='' id='photo-profile-thumbnail'>
                        </div>
                        <label for='photo-upload' class='change-photo-btn'>Change photo</label> 
                    </div>
                    <div class='flex-btn btn-profile'>
                        <button type='button' class='btn btn-white' id='cancelButton'>Cancel</button>
                        <button type='submit' class='btn btn-black'>Save Changes</button>
                    </div>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>
