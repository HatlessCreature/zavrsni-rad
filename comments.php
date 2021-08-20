<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $_GET['post_id'] = $_POST['post_id'];

    $id = $_POST['delete_comment'];
    $post_id = $_POST['post_id'];

    $sql = "UPDATE comments SET deleted = 1 WHERE id = '$id'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    header("Location: single-post.php?post_id=$post_id");

}

    $sql = "SELECT *
    FROM comments 
    WHERE post_id = {$_GET['post_id']} AND deleted = 0";

    $comments = getAll($connection, $sql);
?>
<h2>Create a new comment</h2>
<form method="post" action="create-comment.php">
    <div class="create-new-comment">
        <div class="label-wrapper">
            <label>Name</label>
            <br>
            <input type="text" name="autor">
        </div>

        <div class="label-wrapper">
            <label>Your comment</label>
            <br>
            <textarea type="text" name="text" rows="4" cols="50"></textarea>
        </div>

        <?php
        
        if (isset($_GET['error'])){
            echo (
                "<div class='alert-danger'>
            Please fill out the whole form.
                </div>"), "<br>";
        }  
        ?> 
        

        <input type="hidden" name="post_id" value="<?php echo($_GET['post_id']) ?>">

        <div class="label-wrapper">
            <button>Submit</button>
        </div>
    </div>
</form>
<button class = "btn btn-default">Hide Comments</button>
<div class="comments">
    <h3>Comments</h3>
    <ul>
    <?php 
        foreach ($comments as $comment){
        ?>
        <li class="single-comment">
            <div>posted by: <?php echo $comment['autor'] ?></div>
            <div><?php echo $comment['text'] ?></div>
        </li>
        <form method="post" action="single-post.php?post_id=<?php echo($_GET['post_id']) ?>">
            <button class = "btn btn-default" id="comment_<?php echo $comment['id'] ?>">Delete</button>
            <input type="hidden" name="delete_comment" value="<?php echo($comment['id']) ?>">
            <input type="hidden" name="post_id" value="<?php echo($_GET['post_id']) ?>">
        </form>
        <hr>
    <?php
    }
    ?>
    </ul>
</div>

<script>
    const commButton = document.getElementsByClassName("btn btn-default")[0];
    const commentsDiv = document.getElementsByClassName("comments")[0];
    commButton.addEventListener("click", function(){
        if (commentsDiv.style.display === "none") {
            commentsDiv.style.display = "block";
            commButton.innerHTML = "Hide Comments";
        } 
        else {
            commentsDiv.style.display = "none";
            commButton.innerHTML = "Show Comments";

        }
            })
</script>