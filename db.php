<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "blog";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
        
    }

    function getAll($connection, $sql){
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $all = $statement->fetchAll();
        return $all;
    }

    function getSingle($connection, $sql){
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $single = $statement->fetch();
        return $single;
    }
?>