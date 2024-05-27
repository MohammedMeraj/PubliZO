<?php
include 'session.php';// Start the session to get user email

$server = "localhost";
$user = "root";
$psd = "";
$db = "publizo";

$conn = mysqli_connect($server, $user, $psd, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get current logged-in user's email from session
    
    $email = $_SESSION['user_email'];
   

    // Get form data
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    // Define the table name based on the email
    $table_name = $email . "_table";

    // SQL query to insert article data into the user's table
    $insert_article_query = "INSERT INTO `$table_name` (title, content, date) VALUES ('$title', '$content', '$date')";

    if (mysqli_query($conn, $insert_article_query)) {
        header("Location: publish.php");
    } else {
        echo "Error: " . $insert_article_query . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>