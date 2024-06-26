<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once "dbh.inc.php";

$username = $_SESSION['username'];

// Fetch user data
$user_query = "SELECT * FROM student WHERE username = ?";
$user_stmt = $pdo->prepare($user_query);
$user_stmt->execute([$username]);
$user = $user_stmt->fetch(PDO::FETCH_ASSOC);

// Fetch attendance data for the user
$attendance_query = "SELECT * FROM attendance WHERE roll_number = ?";
$attendance_stmt = $pdo->prepare($attendance_query);
$attendance_stmt->execute([$user['roll_number']]);
$attendance_data = $attendance_stmt->fetch(PDO::FETCH_ASSOC);

// Fetch mse marks data for the user
$msemarks_query = "SELECT * FROM mse_marks_add WHERE roll_number = ?";
$mse_stmt = $pdo->prepare($msemarks_query);
$mse_stmt->execute([$user['roll_number']]);
$msemarksdata = $mse_stmt->fetch(PDO::FETCH_ASSOC);



// Clear output buffer
ob_end_clean();

// Include FPDF library
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

// Display student details
$pdf->Cell(0, 10, 'Name: ' . $user['name'], 0, 1, 'L');
$pdf->Cell(0, 10, 'Roll No. : ' . $user['roll_number'], 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 12); // Set font style to bold
$pdf->Cell(0, 10, 'Attendance:', 0, 1, 'L'); // Left-aligned

// Table Header for Attendance
$pdf->SetFont('Arial', 'B', 12); // Set font style to bold
$pdf->Cell(60, 10, 'Subject', 1, 0, 'C'); // Column 1: Subject
$pdf->Cell(60, 10, 'Attendance', 1, 0, 'C'); // Column 2: Attendance
$pdf->Cell(60, 10, 'Percentage', 1, 1, 'C'); // Column 3: Percentage

// Table Rows for Attendance

$pdf->SetFont('Arial', '', 12); // Reset font style to regular

// Define attendance data for each subject
$subjects = [
    'AOA' => ['attended' => $attendance_data['aoa_attended'] ?? null, 'total' => $attendance_data['aoa_total'] ?? null],
    'EM4' => ['attended' => $attendance_data['em3_attended'] ?? null, 'total' => $attendance_data['em3_total'] ?? null],
    'OS' => ['attended' => $attendance_data['os_attended'] ?? null, 'total' => $attendance_data['os_total'] ?? null],
    'DBMS' => ['attended' => $attendance_data['dbms_attended'] ?? null, 'total' => $attendance_data['dbms_total'] ?? null],
    'PYP' => ['attended' => $attendance_data['pyp_attended'] ?? null, 'total' => $attendance_data['pyp_total'] ?? null]
];

// Loop through each subject and output the attendance data
foreach ($subjects as $subject => $attendance) {
    $pdf->Cell(60, 10, $subject, 1, 0, 'C'); // Column 1: Subject
    if ($attendance['attended'] !== null && $attendance['total'] !== null) {
        $pdf->Cell(60, 10, $attendance['attended'] . '/' . $attendance['total'], 1, 0, 'C'); // Column 2: Attendance
        $percentage = ($attendance['attended'] / $attendance['total']) * 100;
        $pdf->Cell(60, 10, round($percentage) . '%', 1, 1, 'C'); // Column 3: Percentage
    } else {
        $pdf->Cell(120, 10, '--', 1, 1, 'C'); // If data is not available, display '--' for both attendance and percentage
    }
}


$pdf->Ln(10); // This will move to the next line with a height of 10 units

// Mid Semester Exam Section
$pdf->SetFont('Arial', 'B', 12); // Set font style to bold
$pdf->Cell(0, 10, 'Mid Semester Exam:', 0, 1, 'L');

// Table Header for Marks
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 10, 'Subject', 1, 0, 'C');
$pdf->Cell(60, 10, 'Marks Obtained', 1, 0, 'C');
$pdf->Cell(60, 10, 'Percentage', 1, 1, 'C');

// Table Rows for Marks
$pdf->SetFont('Arial', '', 12);
$subjects_marks = [
    'AOA' => ['marks' => $msemarksdata['aoa_marks'] ?? null, 'total' => $msemarksdata['aoa_total'] ?? null],
    'EM4' => ['marks' => $msemarksdata['em3_marks'] ?? null, 'total' => $msemarksdata['em3_total'] ?? null],
    'OS' => ['marks' => $msemarksdata['os_marks'] ?? null, 'total' => $msemarksdata['os_total'] ?? null],
    'DBMS' => ['marks' => $msemarksdata['dbms_marks'] ?? null, 'total' => $msemarksdata['dbms_total'] ?? null],
    'PYP' => ['marks' => $msemarksdata['pyp_marks'] ?? null, 'total' => $msemarksdata['pyp_total'] ?? null]
];


foreach ($subjects_marks as $subject => $marks) {
    $pdf->Cell(60, 10, $subject, 1, 0, 'C');
    if ($marks['marks'] !== null && $marks['total'] !== null) {
        $pdf->Cell(60, 10, $marks['marks'] . '/' . $marks['total'], 1, 0, 'C');
        $percentage = ($marks['marks'] / $marks['total']) * 100;
        $pdf->Cell(60, 10, round($percentage) . '%', 1, 1, 'C');
    } else {
        $pdf->Cell(120, 10, '--', 1, 1, 'C');
    }
}

// Output the PDF
$pdf->Output();
?>