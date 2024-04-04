<?php
// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"]=="POST"){
    // Check if the submitted username and password match the expected values
    if($_POST["email"] === "admin" && $_POST["password"] === "admin"){
        // If credentials are correct, redirect the user to the dashboard
        header("Location: admin.php");
        exit(); // Terminate script execution after redirection
    } else {
        // If credentials are incorrect, display an error message
        echo "<p align='center' style='color: red;'>Invalid username or password!</p>";
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRCRCE</title>
    <link href="php/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgba(230,255,239,0.82)">
<div class="nav" style="height: 50px">
    <?php
    include 'nav.php';
    ?>
</div>
<h1 align="center" style="margin-top: 10%">Admin Login</h1>

<div class="row">

    <div class="col-md-4"></div>
    <div class="col-md-4">

        <form method="post">
            <div class="form-group">
                <label>Email address</label>
                <input type="text" class="form-control" name="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-success">Login</button>
        </form>
    </div>
</div>
</body>
</html>
