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

// Function to get user-specific tables
function getUserTables($conn) {
    $tables = [];
    $sql = "SHOW TABLES LIKE '%table'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_array()) {
            $tables[] = $row[0];
        }
    }

    return $tables;
}

// Function to fetch articles from a table
function fetchArticles($conn, $tableName) {
    $articles = [];
    $sql = "SELECT title, date FROM `$tableName`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $articles[] = $row;
        }
    }

    return $articles;
}

// Get all user-specific tables
$userTables = getUserTables($conn);

// Fetch and display articles
$allArticles = [];

foreach ($userTables as $table) {
    $articles = fetchArticles($conn, $table);
    $username = explode("table", $table)[0]; // Extract username from table name
    foreach ($articles as &$article) {
        $article['author'] = $username; // Add the author to the article data
    }
    $allArticles = array_merge($allArticles, $articles);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Articles : PubliZO</title>
    <style>
        .artSnips:hover {
            border: 5px solid rgba(250, 255, 0, 1);
        }
    </style>
</head>
<body>
    <div class="artWrapper" style="width: 94vw; height: fit-content;  margin: 0 auto; background: transparent; display: flex; flex-direction:column; align-items: center; justify-content: center;">
        <?php foreach ($allArticles as $article): ?>
            <div class="artSnips" style="width: 80vw; height: fit-content; background: white; border-radius: 2vw; margin-top: 20px; border: 0.1px solid rgba(0,0,0,0.2); display: flex; flex-direction: column; align-items: center; justify-content: center; cursor: pointer;">
                <div class="titleSnips" style="width: 90%; height: fit-content; padding: 5px; background: transparent; display: flex; align-items: center; justify-content: left; font-size: 50px; border-bottom: 1px solid gray;">
                    <?php echo htmlspecialchars($article['title']); ?>
                </div>
                <div class="dateholder" style="height: 40px; width: 90%; display: flex; align-items: center; justify-content: space-between;">
                    <div class="authorSnip" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px; color: gray;">
                        Author: <?php echo htmlspecialchars($article['author']); ?>
                    </div>
                    <div class="dateSnips" style="margin-top: 10px; margin-bottom: 10px; font-size: 15px; color: gray;">
                        Published Date: <?php echo htmlspecialchars($article['date']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
<script src="pubScript.js"></script>
</html>
