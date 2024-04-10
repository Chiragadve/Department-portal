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
    "UPDATE attendance AS a JOIN aoa AS ao ON a.roll_number = ao.roll_number SET a.aoa_attended = ao.attended, a.aoa_total = ao.total_conducted",
    "UPDATE attendance AS a JOIN em3 AS e ON a.roll_number = e.roll_number SET a.em3_attended = e.attended, a.em3_total = e.total_conducted",
    "UPDATE attendance AS a JOIN pyp AS p ON a.roll_number = p.roll_number SET a.pyp_attended = p.attended, a.pyp_total = p.total_conducted",
    "UPDATE attendance AS a JOIN dbms AS d ON a.roll_number = d.roll_number SET a.dbms_attended = d.attended, a.dbms_total = d.total_conducted",
    "UPDATE attendance AS a JOIN os AS o ON a.roll_number = o.roll_number SET a.os_attended = o.attended, a.os_total = o.total_conducted"
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
