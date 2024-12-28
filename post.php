<?php
include 'includes.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['create_post'])) {
    $user_id = $_SESSION['user_id'];
    $content = $_POST['content'];

    $sql = "INSERT INTO Posts (user_id, content) VALUES ('$user_id', '$content')";
    if ($conn->query($sql)) {
        echo "Post created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <h1>Create a Post</h1>
    <form action="post.php" method="POST">
        <textarea name="content" rows="5" cols="50" placeholder="Write your post here..." required></textarea>
        <br>
        <button type="submit" name="create_post">Post</button>
    </form>
<div>
<a href="index.php">Back to Home</a>

</div>
</body>
</html>

<style>

    body{
        background-color: gray;
    }

    h1{
        text-align: center;
        color: white; 
      
    }
    div{
        padding-top: 12px;
        text-align: center;
        height: 45px;
        width: 150px;
        margin-left: 250px;
        margin-top: 80px;
        background-color: wheat;
        border: solid, black;
        
    }
    button{ 
        margin-left: 20%;

    }

</style>
