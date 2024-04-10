<?php

session_start(); // Start the session

include 'dbh.inc.php'; // Include your database connection file

// Check if the user is logged in and get the username from the session
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or display an error message
    header("Location: login.php");
    exit(); // Stop further execution
}

$logged_in_username = $_SESSION['username'];

// Fetch the name of the logged-in user from the database
$sql_fetch_name = "SELECT name, subject FROM teachers WHERE username = :username";
$stmt_fetch_name = $pdo->prepare($sql_fetch_name);
$stmt_fetch_name->bindParam(':username', $logged_in_username, PDO::PARAM_STR);
$stmt_fetch_name->execute();
$user_data = $stmt_fetch_name->fetch(PDO::FETCH_ASSOC);

if (!$user_data) {
    // Handle the case if the username does not exist in the table
    echo "Error: Username not found.";
    exit(); // Stop further execution
}

$logged_in_subject = $user_data['subject']; // Subject of the logged-in user

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access the attendance data
    $marks_data = $_POST['marks'];
    $total_marks = $_POST['total_marks'];

    // Loop through the attendance data
    foreach ($marks_data as $roll_number => $marks) {
        // Check if the roll_number already exists
        $table_name = $logged_in_subject . '_mse_marks';
        $sql_check = "SELECT marks, total_marks FROM $table_name WHERE roll_number = :roll_number";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->bindParam(':roll_number', $roll_number);
        $stmt_check->execute();
        $existing_data = $stmt_check->fetch(PDO::FETCH_ASSOC);

        if ($existing_data) {
            // Roll number already exists, update the marks and total_marks values
            $marks_value = isset($marks) ? $existing_data['marks'] + $marks : $existing_data['marks'];
            $total_mark = isset($total_marks) ? $existing_data['total_marks'] + $total_marks : $existing_data['total_marks'];

            // Execute UPDATE query
            $sql_update = "UPDATE $table_name SET marks = :marks, total_marks = :total_marks WHERE roll_number = :roll_number";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->bindParam(':marks', $marks_value);
            $stmt_update->bindParam(':total_marks', $total_mark);
            $stmt_update->bindParam(':roll_number', $roll_number);
            $stmt_update->execute();
        } else {
            // Roll number does not exist, execute INSERT query
            $sql_insert = "INSERT INTO $table_name (roll_number, marks, total_marks) VALUES (:roll_number, :marks, :total_marks)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->bindParam(':roll_number', $roll_number);
            $stmt_insert->bindParam(':marks', $marks);
            $stmt_insert->bindParam(':total_marks', $total_marks);
            $stmt_insert->execute();
        }
    }
}
?>
