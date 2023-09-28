<?php
// Connect to the database (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "certificate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM data WHERE id = 1"; // Replace with your query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(array("error" => "Data not found"));
}

// Close the database connection
$conn->close();
?>
