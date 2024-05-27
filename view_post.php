<?php
include 'session.php'; // Include your session management script

$server = "localhost";
$user = "root";
$psd = "";
$db = "publizo";

// Establishing connection
$conn = new mysqli($server, $user, $psd, $db);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_SESSION['user_email'];
$table_name = $email . "table";
$post_id = $_GET['id'];

// Escape table name
$table_name = $conn->real_escape_string($table_name);

// Query to retrieve the specific post
$stmt = $conn->prepare("SELECT title, content, date FROM `$table_name` WHERE id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($title, $content, $date);
    $stmt->fetch();
    echo "<h1>" . $title . "</h1>";
    echo "<p><em>" . $date . "</em></p>";
    echo "<p>" . nl2br($content) . "</p>";
} else {
    echo "Post not found.";
}

$stmt->close();
$conn->close();
?>
