<?php include('db.php'); ?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog Single Post</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

<?php
include "header.php";
?>

<?php
    
    if (isset($_GET['post_id'])) {
        $sql = "SELECT p.*, u.First_Name,  u.Last_Name
            FROM posts AS p 
            INNER JOIN users AS u ON p.autor = u.id 
            WHERE p.id = {$_GET['post_id']}";
        $post = getSingle($connection,$sql);
    
    

?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">


            <div class="blog-post">
                <h2 class="blog-post-title">
                    <a href = "single-post.php?post_id=<?php echo($post['id']) ?>" class = "post-title"><?php echo($post['title']) ?></a>
                </h2>
                <p class="blog-post-meta"><?php echo($post['created_at']) ?> by <a href="#"><?php echo($post['First_Name']) ?> <?php echo($post['Last_Name']) ?></a></p>

                <p><?php echo($post['body']) ?></p>
            </div><!-- /.blog-post -->
            <form action="posts.php" method="post">
                <input type="hidden" name="post_id" value="<?php echo($_GET['post_id']) ?>">
                <input type="submit" value="Delete this post" class = "btn btn-primary"
                 onclick="return confirm('Are you sure you want to delete this post?')">
            </form>
            <br>

            <?php
            include "comments.php";
            ?>


            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->

        <?php
        include "sidebar.php";
        ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php
    }
    else {
    echo('post_id nije prosledjen kroz $_GET');
    }
?>

<?php
include "footer.php";
?>

</body>
</html>