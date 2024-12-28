<?php include 'includes.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="">
    <?php if (isset($_SESSION['user_id'])): ?>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>

<nav>
        <a href="portfolio.html">View Profile</a>
        <a href="post.php">Create Post</a>
        <a href="logout.php">Logout</a>
</nav>

        <h2>Recent Posts</h2>
        <?php
        $sql = "SELECT Posts.id, Posts.content, Users.username, Posts.created_at 
                FROM Posts INNER JOIN Users ON Posts.user_id = Users.id 
                ORDER BY Posts.created_at DESC";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()): ?>
            
                <h3 style=""><?php echo $row['username']; ?>:</h3>
                <p><?php echo $row['content']; ?></p>
                <small>: <?php echo $row['created_at']; ?></small>
                <a href="like.php?post_id=<?php echo $row['id']; ?>">Like</a>
                <a href="comment.php?post_id=<?php echo $row['id']; ?>">Comment</a>
            
        <?php endwhile; ?>
    <?php else: ?>
        <h2>Please <a href="login.php">login</a> or <a href="register.php">register</a>.</h2>
    <?php endif; ?>
</body>
</html>

<style>
    h1{
        background-color:rgb(60, 100, 180);;
        color: white;
    }
    body{
        background-color:rgb(189, 205, 238);;
    }
    nav {
        display: flex;
        justify-content: center;
        background-color: #222;
    }
    nav a {
        color: #fff;
        padding: 14px 20px;
        text-decoration: none;
        text-align: center;
        transition: background-color 0.3s;
    }
    nav a:hover {
        background-color: #444;
        color: #00ff00;
    }
</style>
