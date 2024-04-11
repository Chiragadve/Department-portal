<?php
// Include database connection
$dsn = "mysql:host=localhost;dbname=student_portal";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit(); // Exit the script if the connection fails
}

// SQL queries to execute
$sql_queries = array(
    "UPDATE mse_marks_add AS a JOIN aoa_mse_marks AS ao ON a.roll_number = ao.roll_number SET a.aoa_marks = ao.marks, a.total_marks = ao.total_conducted",
    "UPDATE mse_marks_add AS a JOIN em3_mse_marks AS e ON a.roll_number = e.roll_number SET a.em3_marks = e.marks, a.total_marks = e.total_conducted",
    "UPDATE mse_marks_add AS a JOIN pyp_mse_marks AS p ON a.roll_number = p.roll_number SET a.pyp_marks = p.marks, a.total_marks = p.total_conducted",
    "UPDATE mse_marks_add AS a JOIN dbms_mse_marks AS d ON a.roll_number = d.roll_number SET a.dbms_marks = d.marks, a.total_marks = d.total_conducted",
    "UPDATE mse_marks_add AS a JOIN os_mse_marks AS o ON a.roll_number = o.roll_number SET a.os_marks = o.marks, a.total_marks = o.total_conducted"
);

// Execute each SQL query
$errors = array();
foreach ($sql_queries as $sql_query) {
    try {
        $pdo->exec($sql_query); // Use exec() instead of query() for non-select queries
    } catch (PDOException $e) {
        $errors[] = "Error executing SQL query: " . $e->getMessage();
    }
}

// Send response
if (empty($errors)) {
    echo "Success";
} else {
    echo implode("<br>", $errors);
}
?>
