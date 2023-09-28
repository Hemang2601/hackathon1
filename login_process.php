<?php
// Connect to the database (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "certificate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email and password from the form (you should also validate and sanitize user inputs)
$email = $_POST["email"];
$password = $_POST["password"];

// Prepare and execute the SELECT query with a WHERE condition
$sql = "SELECT email, password FROM adminuser WHERE email = ?"; // Using a prepared statement
$stmt = $conn->prepare($sql);

// Bind parameters and execute the query
$stmt->bind_param("s", $email);
$stmt->execute();

// Bind the result to variables
$stmt->bind_result($dbEmail, $dbPassword);

// Fetch the result
if ($stmt->fetch()) {
    // Verify the password (you should use password_verify for secure password hashing)
    if ($password === $dbPassword) {
        // Login successful, redirect to the dashboard
        header("Location: admindashboard.html");
        // Make sure to stop script execution after the redirection
        exit();
    } else {
        // Incorrect password, show an 
            // Data doesn't match, show alert and redirect
            echo "<script>alert('Incorrect password'); window.location.href = 'login_process.html';</script>";
         
    }
} else {
    // User with this email not found, show an alert
    echo "<script>alert('User with this email not found'); window.location.href = 'login_process.html';</script>";

    }

// Close the prepared statement and the database connection
$stmt->close();
$conn->close();
?>
