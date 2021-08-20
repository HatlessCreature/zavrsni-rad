<?php 
include('db.php'); 

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $first_name = $_POST['First_Name'];
    $last_name = $_POST['Last_Name'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    if($first_name === "" || $last_name === "" || $title === "" || $body === ""){
        header("Location: create.php?error=true");
    }
    else {
        $sql ="SELECT id FROM users WHERE First_Name = '$first_name' AND Last_Name = '$last_name'";
        $autor = getSingle($connection,$sql);
        $autorId =$autor['id'];

        if (!$autorId){
            $sql = "INSERT INTO users (First_Name, Last_Name) VALUES ('$first_name', '$last_name')";
            $statement = $connection->prepare($sql);
            $statement->execute();

            $sql ="SELECT id FROM users WHERE First_Name = '$first_name' AND Last_Name = '$last_name'";
            $autor = getSingle($connection,$sql);
            $autorId =$autor['id'];
        }


        $sql = "INSERT INTO posts (title, body, autor) VALUES ('$title', '$body', '$autorId')";
        $statement = $connection->prepare($sql);
        $statement->execute();
    
        header("Location: posts.php");

    }
    

}
else {
    echo "Error";
}



?>