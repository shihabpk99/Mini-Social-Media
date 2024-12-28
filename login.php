<?php include 'includes.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body class="l1">
    <h2 >Login</h2>
    <form class="l2"action="login.php" method="POST">
        <input class="l4" type="email" name="email" placeholder="Email" required><br><br>
        <input class="l4" type="password" name="password" placeholder="Password" required><br><br>
        <button class="l5" type="submit" name="login">Login</button>
    </form>

    <?php
    session_start();

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM Users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header("Location: index.php");
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with that email.";
        }
    }
    ?>
</body>
</html>
