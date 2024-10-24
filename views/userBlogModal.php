<div class="bg-black" id="overlay-blogUser">
    <div class="box box-white box-blog">
        <div>
            <?php
            require_once './functions/blogs.php';

            if (isUserLoggedIn()) {
                $userId = $_SESSION['user_id'];

                $blogUser = getBlogByUserId($userId);

            ?>
                <div class="minicard-profile">
                    <h2>Your Blogs</h2>
                </div>
                <hr>
                <div class="card-blog-contain">
                    <?php
                         foreach($blogUser as $blog) { 
                    ?>
                    <a href="detail-blog.php?blog_id=<?php echo $blog['blog_id']; ?>" class="blog-link">
                    <div class="card-blog-user">
                        <div class="card-blog">
                            <img src="./assets/banner-img/<?php echo $blog['image_blog'] ?>" class="image-blog-user" alt="" width="100px">
                            <div class="text-blog-user">
                                <p><?php echo  date('d M Y', strtotime($blog['created_at'])) ?></p>
                                <h2><?php echo $blog['title']; ?></h2>
                                <p><?php echo $blog['description']; ?></p>
                            </div>
                        </div>
                        <div class="delete-blog">
                            <a href="deleteBlog.php?blog_id=<?php echo $blog['blog_id']; ?>" id="delete-blog">Delete</a>
                        </div>
                    </div>
                </a>
            <?php
                }
            }
            ?>
                </div>
        </div>
    </div>
</div>