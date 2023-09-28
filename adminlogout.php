<?php
session_start(); // Start the session

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Redirect to the desired page with a query parameter
header("Location: indexpage.html?logout=1"); // Add "?logout=1" to the URL
exit();
?>
