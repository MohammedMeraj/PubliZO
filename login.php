<?php
include 'session.php';

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

// Retrieving user input from the form
$email = $_POST['email'];
$password = $_POST['password'];
$_SESSION['user_email'] = $email;
    // Check user credentials
    $stmt = $conn->prepare("SELECT id FROM register WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id);
        $stmt->fetch();
        $_SESSION['user_id'] = $user_id;
        header("Location: session.html");
    } else {
         echo "Invalid Credentials!";
    }

    $stmt->close();
?>
