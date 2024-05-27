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

// Escape table name
$table_name = $conn->real_escape_string($table_name);

// Query to retrieve posts from the user's table
$sql = "SELECT id, title, date FROM `$table_name`";
$result = mysqli_query($conn,$sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li><a href='view_post.php?id=" . $row["id"] . "'>" . $row["title"] . " (" . $row["date"] . ")</a></li>";
    }
    echo "</ul>";
} else {
    echo "No posts found.";
}

// Closing the connection
$conn->close();
?>
