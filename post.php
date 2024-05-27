<?php
$server = "localhost";
$user = "root";
$psd = "";
$db = "publizo";

// Establish database connection
$conn = new mysqli($server, $user, $psd, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$table = isset($_GET['table']) ? $_GET['table'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

// Function to fetch article details
function fetchArticleDetails($conn, $table, $id) {
    $sql = "SELECT title, content, date FROM `$table` WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Function to fetch author name from register table
function fetchAuthorName($conn, $email) {
    $sql = "SELECT name FROM register WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['name'];
    } else {
        return "Unknown Author";
    }
}

if ($table && $id) {
    $email = str_replace("table", "", $table); // Extract email from table name
    $authorName = fetchAuthorName($conn, $email); // Get author name from register table
    $article = fetchArticleDetails($conn, $table, $id);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title><?php echo htmlspecialchars($article['title']); ?> - PubliZO</title>
</head>
<body>
    <div class="postWrapper" style="width: 95vw; height: fit-content; margin: 0 auto; background: white;  padding: 20px; margin-top:20px ; ">
        <div style="font-size:55px; font-weight:bold; color:rgb(46,46,47);" style=" margin-bottom:200px;"><?php echo htmlspecialchars($article['title']); ?></div>
        <div class="upperSnipsPost" style="display:flex; justify-content:space-between;">
        <div class="datepostsnip" style="display:flex; font-size:20px; margin-top:10px;">
        <div style=" font-color:gray; ">Published Date:</div> <?php echo htmlspecialchars($article['date']); ?>
        </div>
        <div class="datepostsnip" style="display:flex; font-size:22px; ">
        <div style=" font-color:gray; ">Author: </div> <?php echo htmlspecialchars($authorName); ?>
        </div>
        
        </div>

        <div class="postContent" style="margin-top: 20px; font-size:22px; line-height: 1.6;">
            <?php echo nl2br(htmlspecialchars($article['content'])); ?>
        </div>
    </div>
    <div>
        <br><br><br>
    </div>
</body>
</html>
