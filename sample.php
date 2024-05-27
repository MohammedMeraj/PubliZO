<?php
session_start();
include 'login.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch data for the signed-in user
$stmt = $conn->prepare("SELECT name, email, password, username, article, posts, col7, col8, col9, col10, col11, col12, col13, col14, col15, col16, col17, col18, col19, col20 FROM register WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $password, $username, $article, $posts, $col7, $col8, $col9, $col10, $col11, $col12, $col13, $col14, $col15, $col16, $col17, $col18, $col19, $col20);
$stmt->fetch();
$stmt->close();

// Pass data to the HTML page
$user_data = compact('name', 'email', 'password', 'username', 'article', 'posts', 'col7', 'col8', 'col9', 'col10', 'col11', 'col12', 'col13', 'col14', 'col15', 'col16', 'col17', 'col18', 'col19', 'col20');

// Include the HTML template and pass the data to it

?>
