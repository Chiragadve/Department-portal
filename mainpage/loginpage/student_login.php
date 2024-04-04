<?php
// Start the session
session_start();

require_once "dbh.inc.php"; // Include the database connection file

$errorMsg = ""; // Initialize error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        // Prepare the SQL statement
        $query = "SELECT * FROM student WHERE username=? AND password=?";
        $stmt = $pdo->prepare($query);

        // Bind the parameters and execute the query
        $stmt->execute([$username, $password]);

        // Check if a matching record is found
        if ($stmt->rowCount() > 0) {
            // Set username in session
            $_SESSION['username'] = $username;
            // Redirect to student-main.php if login is successful
            header("Location: student-main.php");
            exit();
        } else {
            // If no matching record found, set error message
            $errorMsg = "Invalid username or password";
        }
    } catch (PDOException $e) {
        // Display an error message if query execution fails
        die("Query failed: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRCRCE STUDENT LOGIN</title>
    <link href="php/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div class="nav" style="height: 150px">
    <?php include 'nav.php'; ?>
</div>

<h1 align="center">Student Login</h1>

<div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4">

        <form method="post" action="">
        <div class="form-group">
            <label >ID</label>
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <label >Password</label>
            <input type="password" class="form-control" name="password" placeholder="password">
        </div>
        <button type="submit" class="btn btn-success">Login</button>
        <?php if (!empty($errorMsg)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $errorMsg; ?>
            </div>
        <?php endif; ?>
        </form>
        
    </div>
</div>
</body>
</html>
