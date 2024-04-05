<?php


session_start(); // Start the session


// Assuming you have a database connection established already
require_once "dbh.inc.php";


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


// echo $user_data;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Access the attendance data
    $attendance_data = $_POST['attendance'];
    $total_conducted = $_POST['total_conducted'];  


   
    // Loop through the attendance data
    foreach ($attendance_data as $roll_number => $attendance) {
        // Check if the roll_number already exists
        $sql_check = "SELECT attended, total_conducted FROM $logged_in_subject WHERE roll_number = :roll_number";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->bindParam(':roll_number', $roll_number);
        $stmt_check->execute();
        $existing_data = $stmt_check->fetch(PDO::FETCH_ASSOC);
       
        if ($existing_data) {
            // Roll number already exists, update the attended and total_conducted values
            $attended = isset($attendance) ? $existing_data['attended'] + $attendance : $existing_data['attended'];
            $conducted = isset($total_conducted) ? $existing_data['total_conducted'] + $total_conducted : $existing_data['total_conducted'];
           
            // Execute UPDATE query
            $sql_update = "UPDATE $logged_in_subject SET attended = :attended, total_conducted = :total_conducted WHERE roll_number = :roll_number";
            $stmt_update = $pdo->prepare($sql_update);
            $stmt_update->bindParam(':attended', $attended);
            $stmt_update->bindParam(':total_conducted', $conducted);
            $stmt_update->bindParam(':roll_number', $roll_number);
            $stmt_update->execute();
        } else {
            // Roll number does not exist, execute INSERT query
            $sql_insert = "INSERT INTO $logged_in_subject (roll_number, attended, total_conducted) VALUES (:roll_number, :attended, :total_conducted)";
            $stmt_insert = $pdo->prepare($sql_insert);
            $stmt_insert->bindParam(':roll_number', $roll_number);
            $stmt_insert->bindParam(':attended', $attendance);
            $stmt_insert->bindParam(':total_conducted', $total_conducted);
            $stmt_insert->execute();
        }
    }
}
?>