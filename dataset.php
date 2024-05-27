<?php

include 'session.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch data for the signed-in user
$stmt = $conn->prepare("SELECT name, email, password FROM register WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($name, $email, $password);
$stmt->fetch();
$stmt->close();

// Pass data to the HTML template
$user_data = compact('name', 'email', 'password');
















//GETs data of articles published

$email = $_SESSION['user_email'];

// Define the table name based on the email
$table_name = $email . "_table";






// SQL query to count the number of articles in the user's table
$count_articles_query = "SELECT COUNT(id) as article_count FROM `$table_name`";
$result = mysqli_query($conn, $count_articles_query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $article_count = $row['article_count'];
} else {
    $article_count = 0; // Default to 0 if there's an error or no articles
}



// SQL query to fetch all articles from the user's table
$fetch_articles_query = "SELECT id, title, content, date FROM `$table_name`";
$result = mysqli_query($conn, $fetch_articles_query);


// Generate HTML output using output buffering
ob_start();
include 'dashboard.html';
$html = ob_get_clean();
echo $html;
?>



