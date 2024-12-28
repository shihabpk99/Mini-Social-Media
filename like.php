<?php
include 'includes.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['post_id'])) {
    $user_id = $_SESSION['user_id'];
    $post_id = $_GET['post_id'];

    // Check if the user already liked the post
    $check = "SELECT * FROM Likes WHERE user_id = '$user_id' AND post_id = '$post_id'";
    $result = $conn->query($check);

    if ($result->num_rows > 0) {
        echo "You already liked this post.";
    } else {
        $sql = "INSERT INTO Likes (user_id, post_id) VALUES ('$user_id', '$post_id')";
        if ($conn->query($sql)) {
            echo "Post liked successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
header("Location: index.php");
exit();
?>
