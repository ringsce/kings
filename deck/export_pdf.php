<?php
// Include the FPDF library
require('fpdf.php');

// Create a new instance of FPDF
$pdf = new FPDF();
$pdf->AddPage();  // Add a new page
$pdf->SetFont('Arial', 'B', 16);  // Set the font and size

// Retrieve form data
$field1 = $_POST['field1'];
$field2 = $_POST['field2'];
$field3 = $_POST['field3'];
$field4 = $_POST['field4'];
$field5 = $_POST['field5'];

// Add the text to the PDF
$pdf->Cell(40, 10, 'Field 1: ' . $field1);
$pdf->Ln(10);  // Line break
$pdf->Cell(40, 10, 'Field 2: ' . $field2);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Field 3: ' . $field3);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Field 4: ' . $field4);
$pdf->Ln(10);
$pdf->Cell(40, 10, 'Field 5: ' . $field5);

// Output the PDF with a downloadable filename
$pdf->Output('D', 'exported_data.pdf');
?>
