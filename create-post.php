<?php 
include('db.php'); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $autor = $_POST['autor'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    if($autor === "" || $title === "" || $body === ""){
        header("Location: create.php?error=true");
    }
    else {
        $sql = "INSERT INTO posts (title, body, autor) VALUES ('$title', '$body', '$autor')";
        $statement = $connection->prepare($sql);
        $statement->execute();
    
        header("Location: posts.php");

    }
    

}
else {
    echo "Error";
}



?>