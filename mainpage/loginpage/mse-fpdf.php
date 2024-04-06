<?php
require('fpdf186/fpdf.php');

// Create instance of FPDF class
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font for the entire document
$pdf->SetFont('Arial', '', 12);

// Add banner image
$pdf->Image('images/banner.jpg', 10, 10, 180); // Replace 'path_to_image.jpg' with the actual path to your image file

// Move down by some distance
$pdf->Ln(50); // Adjust the distance as needed

// Set font style for "Report Card"
$pdf->SetFont('Arial', 'B', 16);

// Center-align "Report Card"
$pdf->Cell(0, 10, 'Report Card', 0, 1, 'C');

// Set font style for student details
$pdf->SetFont('Arial', '', 12); 

// Name: Chirag Manohar Adve (Left-aligned)
$pdf->Cell(0, 10, 'Name: Chirag Manohar Adve', 0, 1, 'L');

// Roll No. : 10398 (Left-aligned)
$pdf->Cell(0, 10, 'Roll No. : 10398', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12); // Set font style to bold
$pdf->Cell(0, 10, 'Attendance:', 0, 1, 'L'); // Left-aligned

// Table Header for Attendance
$pdf->SetFont('Arial', 'B', 12); // Set font style to bold
$pdf->Cell(60, 10, 'Subject', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, 'Attendance', 1, 0, 'C'); // Column 2: Attendance
$pdf->Cell(60, 10, 'Percentage', 1, 1, 'C'); // Column 3: Percentage

// Table Rows for Attendance
$pdf->SetFont('Arial', '', 12); // Reset font style to regular
$pdf->Cell(60, 10, 'AOA', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '90/100', 1, 0, 'C'); // Column 2: Attendance
$pdf->Cell(60, 10, '95%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'EM4', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '88/100', 1, 0, 'C'); // Column 2: Attendance
$pdf->Cell(60, 10, '93%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'OS', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '85/100', 1, 0, 'C'); // Column 2: Attendance
$pdf->Cell(60, 10, '90%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'DBMS', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '92/100', 1, 0, 'C'); // Column 2: Attendance
$pdf->Cell(60, 10, '97%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'PYP', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '86/100', 1, 0, 'C'); // Column 2: Attendance
$pdf->Cell(60, 10, '91%', 1, 1, 'C'); // Column 3: Percentage

$pdf->Ln(10); // This will move to the next line with a height of 10 units

// Mid Semester Exam Section
$pdf->SetFont('Arial', 'B', 12); // Set font style to bold
$pdf->Cell(0, 10, 'Mid Semester Exam:', 0, 1, 'L'); // Left-aligned

// Table Header for Mid Semester Exam
$pdf->SetFont('Arial', 'B', 12); // Set font style to bold
$pdf->Cell(60, 10, 'Subject', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, 'Marks Obtained', 1, 0, 'C'); // Column 2: Marks Obtained
$pdf->Cell(60, 10, 'Percentage', 1, 1, 'C'); // Column 3: Percentage

// Table Rows for Mid Semester Exam
$pdf->SetFont('Arial', '', 12); // Reset font style to regular
$pdf->Cell(60, 10, 'AOA', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '70/100', 1, 0, 'C'); // Column 2: Marks Obtained
$pdf->Cell(60, 10, '75%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'EM4', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '78/100', 1, 0, 'C'); // Column 2: Marks Obtained
$pdf->Cell(60, 10, '82%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'OS', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '80/100', 1, 0, 'C'); // Column 2: Marks Obtained
$pdf->Cell(60, 10, '85%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'DBMS', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '85/100', 1, 0, 'C'); // Column 2: Marks Obtained
$pdf->Cell(60, 10, '90%', 1, 1, 'C'); // Column 3: Percentage
$pdf->Cell(60, 10, 'PYP', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, '75/100', 1, 0, 'C'); // Column 2: Marks Obtained
$pdf->Cell(60, 10, '80%', 1, 1, 'C'); // Column 3: Percentage

// Output the PDF
$pdf->Output();
?>