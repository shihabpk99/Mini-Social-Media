<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "minisocial";


$conn = new mysqli($host, $user, $password, $dbname);

/*
$cdb = "CREATE DATABASE m1";
 mysqli_query($conn, $cdb);

$udb = "USE m1";
mysqli_query($conn, $udb);

$tbl ="CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);
 
CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    content TEXT,
    created_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
 
CREATE TABLE likes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    post_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (post_id) REFERENCES posts(id)
);
 
CREATE TABLE comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    post_id INT,
    content TEXT,
    created_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (post_id) REFERENCES posts(id)
);";

mysqli_query($conn, $tbl);

*/




if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
