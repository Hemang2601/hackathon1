<?php
// Connect to the database (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "certificate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$name = $_POST["username"];
$email = $_POST["email"];
$password=$_POST["password"];

//Insert the appointment into the database
$sql = "INSERT INTO adminuser (username, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo "registered  successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: login_process1.php");

// Close the database connection
$conn->close();
?>


