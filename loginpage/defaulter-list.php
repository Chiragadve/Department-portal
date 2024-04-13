<?php
session_start();

require_once "dbh.inc.php";

try {
    // Fetch attendance data with student names
    $attendance_query = "SELECT a.*, s.name 
                         FROM attendance a 
                         INNER JOIN student s ON a.roll_number = s.roll_number";
    $attendance_stmt = $pdo->query($attendance_query);
    $attendance_data = $attendance_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Output the attendance data
    echo "<pre>";
    var_dump($attendance_data);
    echo "</pre>";
} catch (PDOException $e) {
    // Handle database query error
    die("Error fetching attendance data: " . $e->getMessage());
}
?>
