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

// Participant data (fetch from form inputs or database)
$participantName = $_POST["participantName"];
$courseName = $_POST["courseName"];
$date = $_POST["date"];
$organizationName = $_POST["organizationName"];

$pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for the title
$pdf->SetXY(10, 30); // Adjust coordinates as needed
$pdf->Cell(0, 0, "Certificate of Visiting", 0, 2, 'C');

// Position and add data to the PDF template with the adjusted font size
$pdf->SetFont('helvetica', '', 25); // Adjust the font size as needed for the name
$pdf->SetXY(10, 60); // Adjust coordinates as needed
$pdf->Cell(0, 0, $participantName, 0, 2, 'C');

$pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for other details
$pdf->SetXY(10, 65); // Adjust coordinates as needed
$pdf->Cell(0, 0, "_______________________", 0, 2, 'C');

$pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for the description
$pdf->SetXY(10, 80); // Adjust coordinates as needed
$pdf->Cell(0, 0, "has actively participated in the", 0, 2, 'C');

$pdf->SetFont('helvetica', '', 20); // Adjust the font size as needed for the course name
$pdf->SetXY(10, 90); // Adjust coordinates as needed
$pdf->Cell(0, 0, $courseName, 0, 2, 'C');

$pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for "held on"
$pdf->SetXY(10, 100); // Adjust coordinates as needed
$pdf->Cell(0, 0, "held on", 0, 2, 'C');

$pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for the date
$pdf->SetXY(10, 110); // Adjust coordinates as needed
$pdf->Cell(0, 0, $date, 0, 2, 'C');

$pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for "at"
$pdf->SetXY(10, 120); // Adjust coordinates as needed
$pdf->Cell(0, 0, "at", 0, 2, 'C');

$pdf->SetFont('helvetica', '', 18); // Adjust the font size as needed for "Presented by"
$pdf->SetXY(10, 130); // Adjust coordinates as needed
$pdf->Cell(0, 0, "Presented by", 0, 2, 'C');

$pdf->SetFont('helvetica', '', 20); // Adjust the font size as needed for the organization name
$pdf->SetXY(10, 140); // Adjust coordinates as needed
$pdf->Cell(0, 0, $organizationName, 0, 2, 'C');

$pdf->SetFont('helvetica', '', 20); // Adjust the font size as needed for the line
$pdf->SetXY(10, 150); // Adjust coordinates as needed
$pdf->Cell(0, 0, "__________________", 0, 2, 'C');

// Output the PDF
$pdfData = $pdf->Output('', 'S'); // 'S' returns the PDF as a string

// Clean up
$pdf->close();

// Set the Content-Type to PDF
header('Content-Type: application/pdf');

// Set the Content-Disposition for download
header('Content-Disposition: attachment; filename="certificate.pdf"');

// Output the PDF data
echo $pdfData;

// Redirect to publicdashboard.html after download
echo '<script>window.location.href = "publicdashboard.html";</script>';
?>
