<?php
include 'session.php';

$server = "localhost";
$user = "root";
$psd = "";
$db = "publizo";
$conn = mysqli_connect($server, $user, $psd, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



function create_user_table($email) {
    global $server, $user, $psd, $db;

    // Create connection
    $conn = new mysqli($server, $user, $psd, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Define the table name based on the email
    $table_name = $email . "_table";

    // SQL query to create a new table
    $create_table_query = "CREATE TABLE `$table_name` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(100),
        content TEXT,
        date DATE
    )";

    // Execute the query
    if ($conn->query($create_table_query) === TRUE) {
        echo "Table `$table_name` created successfully.\n";
    } else {
        echo "Error creating table: " . $conn->error . "\n";
    }

    // Close the connection
    $conn->close();
}



$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];







$stmt = $conn->prepare("INSERT INTO register (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $password);
if($stmt->execute()){
    create_user_table($email);
    $_SESSION['user_email'] = $email;
    header("Location: login.html");
    exit();
} else {
    die("Registration failed");
}
$stmt->close();
$conn->close();
?>