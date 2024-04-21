<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

require_once "dbh.inc.php";

$username = $_SESSION['username'];

// Fetch user data
$user_query = "SELECT * FROM student WHERE username = ?";
$user_stmt = $pdo->prepare($user_query);
$user_stmt->execute([$username]);
$user = $user_stmt->fetch(PDO::FETCH_ASSOC);

// Fetch attendance data for the user
$attendance_query = "SELECT * FROM attendance WHERE roll_number = ?";
$attendance_stmt = $pdo->prepare($attendance_query);
$attendance_stmt->execute([$user['roll_number']]);
$attendance_data = $attendance_stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="shortcut icon" href="./images/logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="logo" title="University Management System">
            <img src="./images/logo.jpg" alt="">
        </div>
        <div class="navbar">
            <a href="student-main.php" class="active">
                <span class="material-icons-sharp">home</span>
                <h3>Home</h3>
            </a>
            <a href="timetable.php" onclick="timeTableAll()">
                <span class="material-icons-sharp">today</span>
                <h3>Time Table</h3>
            </a>
            <a href="exam.php">
                <span class="material-icons-sharp">grid_view</span>
                <h3>Examination</h3>
            </a>
            <a href="password.php">
                <span class="material-icons-sharp">password</span>
                <h3>Change Password</h3>
            </a>
            <a href="../index.html">
                <span class="material-icons-sharp" onclick="">logout</span>
                <h3>Logout</h3>
            </a>
        </div>
        <div id="profile-btn">
            <span class="material-icons-sharp">person</span>
        </div>
        <div class="theme-toggler">
            <!-- <span class="material-icons-sharp active">light_mode</span> -->
            <!-- <span class="material-icons-sharp">dark_mode</span> -->
            <!-- </div> -->
    </header>


    <div class="container">
        <aside>
            <div class="profile">
                <div class="top">
                    <div class="profile-photo">
                        <img src="./uploads/<?php echo $user['image']; ?>" alt="Profile Photo">
                    </div>
                    <div class="info">
                        <p>Hey, <b><?php echo $user['name']; ?></b></p>
                        <small class="text-muted"><?php echo $user['roll_number']; ?></small>
                    </div>
                </div>
                <div class="about">
                    <h5>Course</h5>
                    <p><?php echo $user['course']; ?></p>
                    <h5>Divsion</h5>
                    <p><?php echo $user['division'] ?></p>
                    <h5>Current Semester</h5>
                    <p><?php echo $user['semester'] ?></p>
                    <h5>DOB</h5>
                    <p><?php echo $user['dob']; ?></p>
                    <h5>Contact</h5>
                    <p><?php echo $user['contact']; ?></p>
                    <h5>Email</h5>
                    <p><?php echo $user['email']; ?></p>
                    <h5>Address</h5>
                    <p><?php echo $user['address']; ?></p>
                </div>
            </div>

        </aside>
        <main>
            <h1>Your</h1>
            <h1>Overall Attendance</h1>

            <div class="subjects">
                <div class="eg">
                    <?php
                    // Check if attendance is less than 75%
                    if (isset($attendance_data['aoa_attended']) && isset($attendance_data['aoa_total'])) {
                        $attendance_percentage = ($attendance_data['aoa_attended'] / $attendance_data['aoa_total']) * 100;
                        if ($attendance_percentage < 75) {
                            echo "<p><b class='defaulter'>Defaulter</b></p>";
                        }
                    }
                    ?>
                    <span class="material-icons-sharp">architecture</span>
                    <h3>Analysis of Algorithm</h3>
                    <h2>
                        <?php
                        if (isset($attendance_data['aoa_attended']) && isset($attendance_data['aoa_total'])) {
                            echo $attendance_data['aoa_attended'] . '/' . $attendance_data['aoa_total'];
                        } else {
                            echo "--";
                        }
                        ?>
                    </h2>
                    <div class="progress">
                        <svg style="width: 210px; height: 222px; transform: rotate(-90deg);">
                            <circle style="width: 100%; height: 100%; fill: none; stroke: #3498db; stroke-width: 10; stroke-linecap: round; cx: 167px; cy: 46px; r: 38px; stroke-dasharray: 300px"></circle>
                        </svg>

                        <div class="number">
                            <p><?php
                                if (isset($attendance_data['aoa_attended']) && isset($attendance_data['aoa_total'])) {

                                    echo round(($attendance_data['aoa_attended'] / $attendance_data['aoa_total']) * 100) . '%';
                                } else {
                                    echo "--";
                                } ?></p>
                        </div>

                    </div>
                </div>
                <div class="eg">
                    <?php
                    // Check if attendance is less than 75%
                    if (isset($attendance_data['em3_attended']) && isset($attendance_data['em3_total'])) {
                        $attendance_percentage = ($attendance_data['em3_attended'] / $attendance_data['em3_total']) * 100;
                        if ($attendance_percentage < 75) {
                            echo "<p><b class='defaulter'>Defaulter</b></p>";
                        }
                    }
                    ?>
                    <span class="material-icons-sharp">functions</span>
                    <h3>Engineering Mathematics</h3>
                    <h2>
                        <?php
                        if (isset($attendance_data['em3_attended']) && isset($attendance_data['em3_total'])) {
                            echo $attendance_data['em3_attended'] . '/' . $attendance_data['em3_total'];
                        } else {
                            echo "--";
                        }
                        ?>
                    </h2>
                    <div class="progress">
                        <svg style="width: 210px; height: 210px; transform: rotate(-90deg);">
                            <circle style="width: 100%; height: 100%; fill: none; stroke: #3498db; stroke-width: 10; stroke-linecap: round; cx: 167px; cy: 46px; r: 38px; stroke-dasharray: 625px; stroke-dashoffset: calc(625px - (625px * var(--percent)) / 100);"></circle>
                        </svg>

                        <div class="number">
                            <p><?php
                                if (isset($attendance_data['em3_attended']) && isset($attendance_data['em3_total'])) {

                                    echo round(($attendance_data['em3_attended'] / $attendance_data['em3_total']) * 100) . '%';
                                } else {
                                    echo "--";
                                } ?></p>
                        </div>
                    </div>
                </div>
                <div class="cs">
                    <?php
                    // Check if attendance is less than 75%
                    if (isset($attendance_data['pyp_attended']) && isset($attendance_data['pyp_total'])) {
                        $attendance_percentage = ($attendance_data['pyp_attended'] / $attendance_data['pyp_total']) * 100;
                        if ($attendance_percentage < 75) {
                            echo "<p><b class='defaulter'>Defaulter</b></p>";
                        }
                    }
                    ?>
                    <span class="material-icons-sharp">computer</span>
                    <h3>Python Programming</h3>
                    <h2>
                        <?php
                        if (isset($attendance_data['pyp_attended']) && isset($attendance_data['pyp_total'])) {
                            echo $attendance_data['pyp_attended'] . '/' . $attendance_data['pyp_total'];
                        } else {
                            echo "--";
                        }
                        ?>
                    </h2>
                    <div class="progress">
                        <svg style="width: 210px; height: 210px; transform: rotate(-90deg);">
                            <circle style="width: 100%; height: 100%; fill: none; stroke: #3498db; stroke-width: 10; stroke-linecap: round; cx: 167px; cy: 46px; r: 38px; stroke-dasharray: 625px; stroke-dashoffset: calc(625px - (625px * var(--percent)) / 100);"></circle>
                        </svg>
                        <div class="number">
                            <p><?php
                                if (isset($attendance_data['pyp_attended']) && isset($attendance_data['pyp_total'])) {

                                    echo round(($attendance_data['pyp_attended'] / $attendance_data['pyp_total']) * 100) . '%';
                                } else {
                                    echo "--";
                                } ?></p>
                        </div>
                    </div>
                </div>
                <div class="cg">
                    <?php
                    // Check if attendance is less than 75%
                    if (isset($attendance_data['dbms_attended']) && isset($attendance_data['dbms_total'])) {
                        $attendance_percentage = ($attendance_data['dbms_attended'] / $attendance_data['dbms_total']) * 100;
                        if ($attendance_percentage < 75) {
                            echo "<p><b class='defaulter'>Defaulter</b></p>";
                        }
                    }
                    ?>
                    <span class="material-icons-sharp">dns</span>
                    <h3>Database Management</h3>
                    <h2>
                        <?php
                        if (isset($attendance_data['dbms_attended']) && isset($attendance_data['dbms_total'])) {
                            echo $attendance_data['dbms_attended'] . '/' . $attendance_data['dbms_total'];
                        } else {
                            echo "--";
                        }
                        ?>
                    </h2>
                    <div class="progress">
                        <svg style="width: 210px; height: 210px; transform: rotate(-90deg);">
                            <circle style="width: 100%; height: 100%; fill: none; stroke: #3498db; stroke-width: 10; stroke-linecap: round; cx: 167px; cy: 46px; r: 38px; stroke-dasharray: 625px; stroke-dashoffset: calc(625px - (625px * var(--percent)) / 100);"></circle>
                        </svg>
                        <div class="number">
                            <p><?php
                                if (isset($attendance_data['dbms_attended']) && isset($attendance_data['dbms_total'])) {

                                    echo round(($attendance_data['dbms_attended'] / $attendance_data['dbms_total']) * 100) . '%';
                                } else {
                                    echo "--";
                                } ?></p>
                        </div>
                    </div>
                </div>
                <div class="net">
                    <?php
                    // Check if attendance is less than 75%
                    if (isset($attendance_data['os_attended']) && isset($attendance_data['os_total'])) {
                        $attendance_percentage = ($attendance_data['os_attended'] / $attendance_data['os_total']) * 100;
                        if ($attendance_percentage < 75) {
                            echo "<p><b class='defaulter'>Defaulter</b></p>";
                        }
                    }
                    ?>
                    <span class="material-icons-sharp">router</span>
                    <h3>Operating System</h3>
                    <h2>
                        <?php
                        if (isset($attendance_data['os_attended']) && isset($attendance_data['os_total'])) {
                            echo $attendance_data['os_attended'] . '/' . $attendance_data['os_total'];
                        } else {
                            echo "--";
                        }
                        ?>
                    </h2>
                    <div class="progress">
                        <svg style="width: 210px; height: 210px; transform: rotate(-90deg);">
                            <circle style="width: 100%; height: 100%; fill: none; stroke: #3498db; stroke-width: 10; stroke-linecap: round; cx: 167px; cy: 46px; r: 38px; stroke-dasharray: 625px; stroke-dashoffset: calc(625px - (625px * var(--percent)) / 100);"></circle>
                        </svg>
                        <div class="number">
                            <p><?php
                                if (isset($attendance_data['os_attended']) && isset($attendance_data['os_total'])) {

                                    echo round(($attendance_data['os_attended'] / $attendance_data['os_total']) * 100) . '%';
                                } else {
                                    echo "--";
                                } ?></p>
                        </div>

                    </div>
                </div>
            </div>



            <div class="timetable" id="timetable">

            </div>
            <div class="timetable" id="timetable">
                <div>
                    <span id="prevDay">&lt;</span>
                    <h2>MSE/ESE Report card</h2>
                    <span id="nextDay">&gt;</span>
                </div>
                <span class="closeBtn" onclick="timeTableAll()">X</span>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <h2>MSE Report Card</h2>
                            </th>
                            <th>
                                <a href="mse-fpdf.php"><button class="result-button">Click for result</button></a>
                            </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th><br></th>
                        </tr>
                        <tr>
                            <th>
                                <h2>ESE Report Card</h2>
                            </th>
                            <th>
                                <a href="ese-fpdf.php"><button class="result-button">Click for result</button></a>
                            </th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>

            </div>
        </main>


        <div class="right">
            <div class="announcements">
                <h2>Announcements</h2>
                <div class="updates">
                    <div class="message">
                        <p> <b>Academic</b> Summer training internship with Live Projects.</p>
                        <small class="text-muted"><button class="button-admin">More Info</button></small>
                    </div>
                    <div class="message">
                        <p> <b>Co-curricular</b> Global internship oportunity by Student organization.</p>
                        <small class="text-muted"><button class="button-admin">More Info</button></small>
                    </div>
                    <div class="message">
                        <p> <b>Examination</b> Instructions for Mid Term Examination.</p>
                        <small class="text-muted"><button class="button-admin">More Info</button></small>
                    </div>
                </div>
            </div>


            <div class="leaves">
                <h2>Teachers</h2>
                <?php

                // Fetch the distinct teachers from the student table
                $sql_fetch_teachers = "SELECT DISTINCT teacher FROM student";
                $stmt_fetch_teachers = $pdo->query($sql_fetch_teachers);
                $teachers = $stmt_fetch_teachers->fetchAll(PDO::FETCH_COLUMN);
                ?>

                <?php foreach ($teachers as $teacher) : ?>
                    <?php
                    // Split multiple teachers if comma-separated
                    $teacher_names = explode(',', $teacher);
                    foreach ($teacher_names as $teacher_name) :
                    ?>
                        <div class="teacher">
                            <!-- Profile photo and info for the teacher -->
                            <div class="profile-photo"><img src="./images/user.png" alt=""></div>
                            <div class="info">
                                <!-- Teacher's name -->
                                <h3><?php echo $teacher_name; ?></h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>

            </div>
            <!-- <div class="teacher">
                    <div class="profile-photo"><img src="./images/profile-4.jpg" alt=""></div>
                    <div class="info">
                        <h3>Himanshu Jindal</h3>
                        <small class="text-muted">NS</small>
                    </div>
                </div> -->
        </div>


    </div>
    </div>


    <script src="timeTable.js"></script>
    <script src="app.js"></script>
</body>
<style>
    .defaulter {
        color: red;
    }

    /* CSS */
    .result-button {
        align-items: center;
        background-color: #FFFFFF;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: .25rem;
        box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
        box-sizing: border-box;
        color: rgba(0, 0, 0, 0.85);
        cursor: pointer;
        display: inline-flex;
        font-family: system-ui, -apple-system, system-ui, "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 16px;
        font-weight: 600;
        justify-content: center;
        line-height: 1.25;
        margin: 0;
        min-height: 1.5rem;
        padding: calc(.875rem - 1px) calc(1.5rem - 1px);
        position: relative;
        text-decoration: none;
        transition: all 250ms;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: baseline;
        width: auto;
    }

    .button-6:hover,
    .button-6:focus {
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
        color: rgba(0, 0, 0, 0.65);
    }

    .button-6:hover {
        transform: translateY(-1px);
    }

    .button-6:active {
        background-color: #F0F0F1;
        border-color: rgba(0, 0, 0, 0.15);
        box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
        color: rgba(0, 0, 0, 0.65);
        transform: translateY(0);
    }

    .button-admin {
        align-items: center;
        appearance: none;
        background-color: #fff;
        border: 1px solid #dbdbdb;
        border-radius: .375em;
        box-shadow: none;
        box-sizing: border-box;
        color: #363636;
        cursor: pointer;
        display: inline-flex;
        font-family: BlinkMacSystemFont, -apple-system, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 1rem;
        height: 2.5em;
        justify-content: center;
        line-height: 1.5;
        padding: calc(.5em - 1px) 1em;
        position: relative;
        text-align: center;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        vertical-align: top;
        white-space: nowrap;
    }
</style>

</html>