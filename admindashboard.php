<?php
// Connect to the database (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "certificate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get data from the form
$participantName = $_POST["participantName"];
$courseName = $_POST["courseName"];
$date=$_POST["date"];
$organizationName=$_POST["organizationName"];

//Insert the appointment into the database
$sql = "INSERT INTO certificatedata (participantName, courseName, date , organizationName ) VALUES ('$participantName', '$courseName', '$date', '$organizationName')";
if ($conn->query($sql) === TRUE) {
    
    header("Location: form_certificate.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    //header("Location: certificate.php");

// Close the database connection
$conn->close();
?>



