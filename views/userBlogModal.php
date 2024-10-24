<div class="bg-black" id="overlay-blogUser">
    <div class="box box-white box-blog">
        <div>
            <?php
            if (isUserLoggedIn()) {
                $userId = $_SESSION['user_id'];

                $userData = getUser($userId);
            ?>
                <div class="minicard-profile">
                    <h2>Your Blogs</h2>
                </div>
                <hr>
                <div class="card-blog-contain">
                    <div class="card-blog-user">
                        <div class="card-blog">
                            <img src="https://i.pinimg.com/564x/05/7b/6d/057b6d055a74c3d1075edcf96dad7e18.jpg" class="image-blog-user" alt="" width="100px">
                            <div class="text-blog-user">
                                <p>21 Oct 2024</p>
                                <h2>Title</h2>
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="delete">
                            <p id="delete-blog">Delete</p>
                        </div>
                    </div>
                    <div class="card-blog-user">
                        <div class="card-blog">
                            <img src="https://i.pinimg.com/564x/05/7b/6d/057b6d055a74c3d1075edcf96dad7e18.jpg" class="image-blog-user" alt="" width="100px">
                            <div class="text-blog-user">
                                <p>21 Oct 2024</p>
                                <h2>Title</h2>
                                <p>Description</p>
                            </div>
                        </div>
                        <div class="delete">
                            <p id="delete-blog">Delete</p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>