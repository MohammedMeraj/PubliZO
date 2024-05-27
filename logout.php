<?php
include 'session.php';
// Unset all session variables
session_unset();
// Destroy the session
session_destroy();
// Redirect to log.php
header("Location: login.html");
exit();
?>
