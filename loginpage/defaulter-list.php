<?php
require_once "dbh.inc.php";
require('fpdf186/fpdf.php');

try {
    // Fetch attendance data with student names
    $attendance_query = "SELECT a.*, s.name 
                         FROM attendance a 
                         INNER JOIN student s ON a.roll_number = s.roll_number";
    $attendance_stmt = $pdo->query($attendance_query);
    $attendance_data = $attendance_stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Handle database query error
    die("Error fetching attendance data: " . $e->getMessage());
}

// Create instance of FPDF class
$pdf = new FPDF();

// Add a page
$pdf->AddPage();

// Set font for the entire document
$pdf->SetFont('Arial', '', 12);

// Add banner image
$pdf->Image('images/banner.jpg', 10, 10, 180); 

// Move down by some distance
$pdf->Ln(50); 

// Set font style for "Report Card"
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Defaulters List (Subject Wise) ', 0, 1, 'C');

$pdf->Cell(0, 10, 'Comps   SE   Div A Semester IV', 0, 1, 'C');


$pdf->Ln(10); // Add 10 units of space

// Add a header for the table
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 10, 'Roll no.', 1, 0, 'C');
$pdf->Cell(40, 10, 'Name', 1, 0, 'C');
$pdf->Cell(20, 10, 'AOA (%)', 1, 0, 'C'); // Smaller width for AOA
$pdf->Cell(20, 10, 'EM3 (%)', 1, 0, 'C'); // Smaller width for EM3
$pdf->Cell(20, 10, 'PYP (%)', 1, 0, 'C'); // Smaller width for PYP
$pdf->Cell(20, 10, 'DBMS (%)', 1, 0, 'C'); // Smaller width for DBMS
$pdf->Cell(20, 10, 'OS (%)', 1, 0, 'C'); // Smaller width for OS
$pdf->Cell(20, 10, 'Total (%)', 1, 1, 'C'); // Total attendance percentage

// Set font style for table data
$pdf->SetFont('Arial', '', 12);

// Iterate through attendance data and add to the PDF
foreach ($attendance_data as $attendance) {
    // Calculate attendance percentage for each subject
    $aoa_percentage = ($attendance['aoa_attended'] / $attendance['aoa_total']) * 100;
    $em3_percentage = ($attendance['em3_attended'] / $attendance['em3_total']) * 100;
    $pyp_percentage = ($attendance['pyp_attended'] / $attendance['pyp_total']) * 100;
    $dbms_percentage = ($attendance['dbms_attended'] / $attendance['dbms_total']) * 100;
    $os_percentage = ($attendance['os_attended'] / $attendance['os_total']) * 100;

    // Calculate total attendance percentage
    $total_percentage = ($aoa_percentage + $em3_percentage + $pyp_percentage + $dbms_percentage + $os_percentage) / 5;

    // Check if total attendance percentage is less than 75%
    if ($total_percentage < 75) {
        $pdf->Cell(20, 10, $attendance['roll_number'], 1, 0, 'C');
        $pdf->Cell(40, 10, $attendance['name'], 1, 0, 'C');
        $pdf->Cell(20, 10, round($aoa_percentage, 2), 1, 0, 'C');
        $pdf->Cell(20, 10, round($em3_percentage, 2), 1, 0, 'C');
        $pdf->Cell(20, 10, round($pyp_percentage, 2), 1, 0, 'C');
        $pdf->Cell(20, 10, round($dbms_percentage, 2), 1, 0, 'C');
        $pdf->Cell(20, 10, round($os_percentage, 2), 1, 0, 'C');
        $pdf->Cell(20, 10, round($total_percentage, 2), 1, 1, 'C');
    }
}

// Output the PDF
$pdf->Output();
?>
