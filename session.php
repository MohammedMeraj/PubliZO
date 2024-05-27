<?php
// Start session
session_start();

$server = "localhost";
$user = "root";
$psd = "";
$db = "publizo";

$conn = mysqli_connect($server, $user, $psd, $db);
?>
