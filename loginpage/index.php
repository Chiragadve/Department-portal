<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<title>Login</title>
</head>

<body>
    <nav>
        <a href="#" class="logo">
            <img src="image/logo.png" alt="Logo">
        </a>
        <label class="menu-icon" for="menu-btn">
            <span class="nav-icon"></span>
        </label>
        <ul class="menu">
            <li><a href="#">About</a></li>
            <li><a href="#">Notification</a></li>
            <li><a href="#">Results</a></li>
        </ul>
    </nav>
    <div style="height: 210px;"></div> <!-- Added space for the fixed navbar -->
    <div class="container d-flex justify-content-center align-items-center min-vh-500">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="image/admin.jpg" class="card-img-top" alt="Admin Image">
                    <div class="card-body">
                        <input type="radio" class="btn-check" name="userType" id="admin" value="admin" autocomplete="off" checked>
                        <label class="btn" for="admin">Admin</label>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="image/teacher.jpg" class="card-img-top" alt="Teacher Image">
                    <div class="card-body">
                        <input type="radio" class="btn-check" name="userType" id="teacher" value="teacher" autocomplete="off">
                        <label class="btn" for="teacher">Teacher</label>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <img src="image/student.jpg" class="card-img-top" alt="Student Image">
                    <div class="card-body">
                        <input type="radio" class="btn-check" name="userType" id="student" value="student" autocomplete="off">
                        <label class="btn" for="student">Student</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="next-btn">
        <button type="button" class="btn btn-primary btn-lg" onclick="redirectToSelectedPage()"> Next </button>
    </div>

    <script>
        function redirectToSelectedPage() {
            const selectedValue = document.querySelector('input[name="userType"]:checked').value;
            if (selectedValue === "admin") {
                window.location.href = "admin_login.php";
            } else if (selectedValue === "teacher") {
                window.location.href = "teacher-login.php";
            } else if (selectedValue === "student") {
                window.location.href = "student_login.php";
            }
        }
    </script>
</body>


</html>