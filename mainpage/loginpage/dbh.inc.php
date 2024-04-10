<?php
$dsn = "mysql:host=localhost;dbname=student_portal"; // Adjusted the DSN format
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass); // Fixed the DSN format
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Added a semicolon at the end of the line
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage(); // Added a semicolon at the end of the line
}
?>
