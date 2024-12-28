<?php
$sql = "SELECT Posts.id, Posts.content, Users.username, Posts.created_at 
        FROM Posts INNER JOIN Users ON Posts.user_id = Users.id 
        ORDER BY Posts.created_at DESC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()):
    $post_id = $row['id'];
    ?>
    <div>
        <h3><?php echo $row['username']; ?>:</h3>
        <p><?php echo $row['content']; ?></p>
        <small>Posted on <?php echo $row['created_at']; ?></small>
        <a href="like.php?post_id=<?php echo $post_id; ?>">Like</a>
        
        <?php
        // Count Likes
        $like_sql = "SELECT COUNT(*) AS like_count FROM Likes WHERE post_id = '$post_id'";
        $like_result = $conn->query($like_sql);
        $like_count = $like_result->fetch_assoc()['like_count'];
        ?>
        <span>(<?php echo $like_count; ?> Likes)</span>

        <a href="comment.php?post_id=<?php echo $post_id; ?>">Comment</a>

        <h4>Comments:</h4>
        <?php
        // Fetch Comments
        $comment_sql = "SELECT Comments.content, Users.username 
                        FROM Comments INNER JOIN Users ON Comments.user_id = Users.id 
                        WHERE Comments.post_id = '$post_id'";
        $comment_result = $conn->query($comment_sql);

        while ($comment = $comment_result->fetch_assoc()):
            ?>
            <p><strong><?php echo $comment['username']; ?>:</strong> <?php echo $comment['content']; ?></p>
        <?php endwhile; ?>
    </div>
    <hr>
<?php endwhile; ?>
