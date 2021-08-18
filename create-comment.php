<?php 
include('db.php'); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $autor = $_POST['autor'];
    $text = $_POST['text'];
    $post_id = $_POST['post_id'];

    if($autor === "" || $text === ""){
        header("Location: single-post.php?post_id=$post_id&error=true");
    }
    else {
        $sql = "INSERT INTO comments (autor, text, post_id) VALUES ('$autor', '$text', '$post_id')";
        $statement = $connection->prepare($sql);
        $statement->execute();
    
        header("Location: single-post.php?post_id=$post_id");

    }
    

}
else {
    echo "Error";
}



?>