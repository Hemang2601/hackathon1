<?php
// Connect to the database (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "certificate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$eventID = $_POST["eventid"];
$eventName = $_POST["eventname"];
$date = $_POST["date"];
$organizationName = $_POST["organization_name"];

// Check if the event ID already exists in the database
$checkEventID = "SELECT * FROM eventinfo WHERE event_id='$eventID'";
$result = $conn->query($checkEventID);

if ($result->num_rows > 0) {
    // Event ID already exists, display an alert box
    echo '<script>alert("Event ID is already registered.");</script>';
    header("refresh:0.1;url=addevent.html");
} else {
    // Event ID is not registered, insert data into the database
    $sql = "INSERT INTO eventinfo (event_id, event_name, date, organization_name)
            VALUES ('$eventID', '$eventName', '$date', '$organizationName')";

    if ($conn->query($sql) === TRUE) {
        echo "Event added successfully!";
        // Redirect to addevent.html after a short delay (e.g., 2 seconds)
        header("refresh:0.5;url=addevent.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
