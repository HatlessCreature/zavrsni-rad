<?php
    $sql = "SELECT *
    FROM comments 
    WHERE post_id = {$_GET['post_id']}";

    $comments = getAll($connection, $sql)
?>

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