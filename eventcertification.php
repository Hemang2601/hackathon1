<?php
// Connect to the database (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "certificate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the values from the form
$eventid = $_POST['eventid'];
$participantid = $_POST['participantid'];

// Query to fetch data from participantinfo table
$query = "SELECT * FROM participantinfo WHERE eventid = '$eventid' AND participantid = '$participantid'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Check if a row was found (data matches)
if (mysqli_num_rows($result) > 0) {
    // Fetch and display participant details
    while ($row = mysqli_fetch_assoc($result)) {
         header("Location: form_certificate.php");
    }
} else {
    // Data doesn't match, show alert and redirect
    echo "<script>alert('Certification Failed. Invalid Event ID or Participant ID.'); window.location.href = 'eventcertification.html';</script>";
}

// Close the database connection
mysqli_close($conn);
?>
