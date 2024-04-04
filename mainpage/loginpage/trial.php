<?php
// Assuming you have a database connection established already
require_once "dbh.inc.php";

// Check if there is a foreign key constraint between the columns
$sql = "SELECT TABLE_NAME, COLUMN_NAME, CONSTRAINT_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME 
        FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
        WHERE TABLE_SCHEMA = :database_name 
        AND COLUMN_NAME = 'teacher' 
        AND TABLE_NAME = 'student' 
        AND CONSTRAINT_NAME <> 'PRIMARY'";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(':database_name', $your_database_name, PDO::PARAM_STR);
$your_database_name = "your_database_name"; // Replace with your actual database name
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo "The 'teacher' column in the 'student' table is bound by a foreign key.";
    echo "<br>";
    echo "Constraint Name: " . $result['CONSTRAINT_NAME'];
    echo "<br>";
    echo "Referenced Table: " . $result['REFERENCED_TABLE_NAME'];
    echo "<br>";
    echo "Referenced Column: " . $result['REFERENCED_COLUMN_NAME'];
} else {
    echo "There is no foreign key constraint between the 'teacher' column in the 'student' table and any other table.";
}
?>
