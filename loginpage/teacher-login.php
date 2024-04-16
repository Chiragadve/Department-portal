<?php
session_start();

require_once "dbh.inc.php";

$errorMsg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        $query = "SELECT * FROM teachers WHERE username=? AND password=?";
        $stmt = $pdo->prepare($query);

        $stmt->execute([$username, $password]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['username'] = $username;
            header("Location: teacher-main.php");
            exit();
        } else {
            $errorMsg = "Invalid username or password";
        }
    } catch (PDOException $e) {
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
    <title>FRCRCE TEACHER LOGIN</title>
    <link href="php/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div class="nav" style="height: 150px">
    <?php include 'nav.php'; ?>
</div>

<h1 align="center">Teacher Login</h1>

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
