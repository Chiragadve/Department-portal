<?php
require('fpdf186/fpdf.php');

// Create instance of FPDF class
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font for the entire document
$pdf->SetFont('Arial', '', 12);

$pdf->Image('images/banner.jpg', 10, 10, 180); // Replace 'path_to_image.jpg' with the actual path to your image file


// Output PDF to browser
$pdf->Output();
?>
