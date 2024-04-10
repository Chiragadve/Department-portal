<?php
// Include your database connection file
include 'dbh.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $eid = $_POST['eid'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department']; // Added department
    $division = $_POST['division']; // Added division
    $semester = $_POST['semester']; // Added semester
    $subject = $_POST['subject']; // Added subject

    // Prepare SQL statement to insert data into the teachers table
    $stmt = $pdo->prepare("INSERT INTO teachers (Name, eid, username, password, department, division, semester, subject) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $eid);
    $stmt->bindParam(3, $username);
    $stmt->bindParam(4, $password);
    $stmt->bindParam(5, $department);
    $stmt->bindParam(6, $division);
    $stmt->bindParam(7, $semester);
    $stmt->bindParam(8, $subject);

    // Execute the statement
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->rowCount() > 0) {
        echo "New teacher added successfully!";
    } else {
        echo "Error adding teacher!";
    }
}
?>
