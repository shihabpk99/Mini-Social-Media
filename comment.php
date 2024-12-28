<?php
include 'includes.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];
}

if (isset($_POST['submit_comment'])) {
    $user_id = $_SESSION['user_id'];
    $post_id = $_POST['post_id'];
    $content = $_POST['content'];

    $sql = "INSERT INTO Comments (user_id, post_id, content) VALUES ('$user_id', '$post_id', '$content')";
    if ($conn->query($sql)) {
        echo "Comment added successfully!";
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
    <h1>Comment on Post</h1>
    <form action="comment.php" method="POST">
        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
        <textarea name="content" rows="4" cols="50" placeholder="Comment here..." required></textarea>
        <br><br>
        <button type="submit" name="submit_comment">Comment</button>
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
