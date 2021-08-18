<?php
    $sql = "SELECT id, title, created_at
        FROM posts 
        ORDER BY created_at DESC LIMIT 5";
    $posts = getAll($connection,$sql);

?>


<aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>Latest Posts</h4>
                <?php
                    foreach ($posts as $post) {
                ?>
                <a href = "single-post.php?post_id=<?php echo($post['id']) ?>" class = "post-title"><?php echo($post['title']) ?></a>
                <br>
                <?php
                    }
                ?>
            </div>
            
        </aside><!-- /.blog-sidebar -->'
