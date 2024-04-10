<?php
// Include your database connection file
include 'dbh.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $roll_number = $_POST['roll_number'];
    $dob = $_POST['dob'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $course = $_POST['course'];
    $division = $_POST['division'];
    $semester = $_POST['semester'];
    $image = $_FILES["image"]["name"];

    // Retrieve teacher names whose department, division, and semester match the student's course, division, and semester
    $query = "SELECT name FROM teachers WHERE department = :department AND division = :division AND semester = :semester";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':department', $course);
    $stmt->bindParam(':division', $division);
    $stmt->bindParam(':semester', $semester);
    $stmt->execute();
    $teacherNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Combine teacher names into a single string
    $combinedTeacherNames = implode(", ", $teacherNames);

    // Image handling
    $temp_name = $_FILES["image"]["tmp_name"];
    $folder = "uploads/".$image;
    move_uploaded_file($temp_name, $folder);

    // Insert student data into the student table along with the assigned teacher's names
    $query = "INSERT INTO student (name, roll_number, dob, username, password, contact, email, address, course, division, semester, teacher, image) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $roll_number, $dob, $username, $password, $contact, $email, $address, $course, $division, $semester, $combinedTeacherNames, $image]);

    if ($stmt->rowCount() > 0) {
        echo "Student added successfully!";
    } else {
        echo "Error adding student!";
    }
}
?>
