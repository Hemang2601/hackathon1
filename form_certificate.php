<?php
// Include the TCPDF library
require_once('tcpdf.php');

// Create a new TCPDF instance
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('HEMANG');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Certificate');
$pdf->SetSubject('Certificate Subject');
$pdf->SetKeywords('Certificate, TCPDF, PHP');

// Add a page (use the default page size)
$pdf->AddPage();

// Set font for the majority of the text (excluding the name)
$pdf->SetFont('helvetica', '', 20);

// Load an existing PDF template as a background image
$template = 'Certificate_Template.jpg'; // Replace with your template file
$pdf->Image($template, 0, 0, 210, 210); // Adjust dimensions as needed

// Set text color
$pdf->SetTextColor(0, 0, 0);

// Connect to the database (replace with your database credentials)
// Connect to the database (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "certificate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the participant ID you want to fetch data for (replace with your logic)
$participantId = 22080; // Change this to the appropriate participant ID

// Query to fetch data from the participantinfo table
$query = "SELECT * FROM participantinfo WHERE participantid = $participantId";

// Execute the query
$result = $conn->query($query);

// Check if a row was found
if ($result->num_rows > 0) {
    // Fetch and display participant details
    while ($row = $result->fetch_assoc()) {
        // Get the participant's name and other data from the database
        $name = $row['participantname'];
        //$eventname = $row['event_name'];
        //$course = $row['course']; // Adjust column name as needed
        //$conductedBy = $row['conductedby']; // Adjust column name as needed

        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for the name
        $pdf->SetXY(10, 30); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "Certificate of Participation", 0, 2, 'C');
        
        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for the name
        $pdf->SetXY(10, 45); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "This is to certify that", 0, 2, 'C');

        // Position and add data to the PDF template with the adjusted font size
        $pdf->SetFont('helvetica', '', 25); // Adjust the font size as needed for the name
        $pdf->SetXY(10, 60); // Adjust coordinates as needed
        $pdf->Cell(0, 0, $name, 0, 2, 'C');

        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for the name
        $pdf->SetXY(10, 65); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "_______________________", 0, 2, 'C');

        
        // // Position and add course data to the PDF
        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed
        $pdf->SetXY(10, 80); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "has actively participated in the", 0, 2, 'C');
        
        // Position and add conducted by data to the PDF
        $pdf->SetFont('helvetica', '', 20);
        $pdf->SetXY(10, 90); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "RUNING", 0, 2, 'C');

        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed
        $pdf->SetXY(10, 100); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "held on", 0, 2, 'C');

        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed
        $pdf->SetXY(10, 110); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "26 August 2023", 0, 2, 'C');

        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed
        $pdf->SetXY(10, 120); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "at", 0, 2, 'C');

        
        $pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed
        $pdf->SetXY(10, 130); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "Presented by", 0, 2, 'C');

        $pdf->SetFont('helvetica', '', 20); // Adjust the font size as needed
        $pdf->SetXY(10, 140); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "ATMIYA UNIVERSITY", 0, 2, 'C');

        $pdf->SetFont('helvetica', '', 20); // Adjust the font size as needed for the name
        $pdf->SetXY(10, 140); // Adjust coordinates as needed
        $pdf->Cell(0, 0, "__________________", 0, 2, 'C');


    }
} else {
    // Handle the case where no data is found for the given participant ID
    echo "Participant not found.";
}

// Output the PDF
$pdf->Output('certificate.pdf', 'I'); // 'I' sends the PDF to the browser for inline viewing

// Clean up
$pdf->close();

// Close the database connection
$conn->close();
?>
