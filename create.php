<?php include('db.php'); ?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog Posts</title>

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

<main role="main" class="container">

    <div class="row">

    <form method="post" action="create-post.php">
        <div class="create-new-post">
            <div class="label-wrapper">
                <label>Title</label>
                <br>
                <input type="text" name="title">
            </div>

            <div class="label-wrapper">
                <label>Post</label>
                <br>
                <textarea type="text" name="body" rows="8" cols="80"></textarea>
            </div>

            <div class="label-wrapper">
                <label>First Name</label>
                <br>
                <input type="text" name="First_Name">
            </div>
            
            <div class="label-wrapper">
                <label>Last Name</label>
                <br>
                <input type="text" name="Last_Name">
            </div>
            <br>

            <?php
            
            if (isset($_GET['error'])){
                echo (
                    "<div class='alert-danger'>
                Please fill out the whole form.
                    </div>"), "<br>";
            }  
            ?> 
            <br>

            <div class="label-wrapper">
                <button>Submit</button>
            </div>
        </div>
    </form>
        
    <?php
        include "sidebar.php";
    ?>

    </div><!-- /.row -->

</main><!-- /.container -->

<?php
include "footer.php";
?>

<script>
    document.getElementById("nav-home").setAttribute("class", "nav-link");
    document.getElementById("nav-create").setAttribute("class", "nav-link active");
</script>

</body>
</html>