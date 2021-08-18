<?php
    $sql = "SELECT *
    FROM comments 
    WHERE post_id = {$_GET['post_id']}";

    $comments = getAll($connection, $sql)
?>
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