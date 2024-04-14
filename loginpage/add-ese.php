<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Teacher Panel</title>
  <link rel="stylesheet" href="style.css" />

  <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="logo.jpg" style="
        margin-top: 10px;
         background-color: var(--color-white);
        padding: 0.8rem;
         border-radius: 7px;
        height: 74px;
        margin-left:12px;
    width: 200px;
    
        alt="">
      </div>
      <ul class=" nav-links">
      <li>
        <a href="teacher-main.php">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="add-attandance.php" >
          <i class="bx bx-box"></i>
          <span class="links_name">Add Attandance</span>
        </a>
      </li>
      <li>
        <a href="add-mse.php" class="active">
          <i class="bx bx-box"></i>
          <span class="links_name">Add MSE Marks</span>
        </a>
      </li>
      <li class="log_out">
        <a href="../index.html">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Add Attandance</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div>
        <div </div>
      </nav>

      <div class="home-content">
        <div class="overview-boxes">
            
          <?php
          session_start(); // Start the session

          // Assuming you have a database connection established already
          require_once "dbh.inc.php";

          // Check if the user is logged in and get the username from the session
          if (!isset($_SESSION['username'])) {
            // Redirect to the login page or display an error message
            header("Location: login.php");
            exit(); // Stop further execution
          }

          $logged_in_username = $_SESSION['username'];

          // Fetch the name of the logged-in user from the database
          $sql_fetch_name = "SELECT name,subject FROM teachers WHERE username = :username";
          $stmt_fetch_name = $pdo->prepare($sql_fetch_name);
          $stmt_fetch_name->bindParam(':username', $logged_in_username, PDO::PARAM_STR);
          $stmt_fetch_name->execute();
          $user_data = $stmt_fetch_name->fetch(PDO::FETCH_ASSOC);

          if (!$user_data) {
            // Handle the case if the username does not exist in the table
            echo "Error: Username not found.";
            exit(); // Stop further execution
          }

          $logged_in_name = $user_data['name']; // Name of the logged-in user
          $logged_in_subject = $user_data['subject']; // Subject of the logged-in user



          // Fetch the students whose teacher column matches the logged-in teacher's name
          $sql_fetch_students = "SELECT roll_number, name FROM student WHERE teacher LIKE :teacher";
          $stmt_fetch_students = $pdo->prepare($sql_fetch_students);
          $stmt_fetch_students->bindValue(':teacher', '%' . $logged_in_name . '%', PDO::PARAM_STR);
          $stmt_fetch_students->execute();


          ?>

          <div class="form-container">
            <!-- <h2>Attendance Form</h2> -->
            <style>
              table {
                width: 80%;
                margin: 0 auto;
                border-collapse: collapse;
              }
              
              th,
              td {
                border: 1px solid black;
                padding: 10px;
                text-align: left;
              }
              
              .bold-row th {
                font-weight: bold;
              }
              </style>
              </head>
              
              <form action="submit-mse.php" method="POST">
              <body>
                <h2 align="center">MSE Marks Form</h2>
                <br>
                <table>
                  <tr>
                    <th>Faculty Name</th>
                    <td><?php echo $logged_in_name; ?></td>
                  </tr>
                  <tr>
                    <th>Subject Name</th>
                    <td><?php echo $logged_in_subject; ?></td>
                  </tr>
                  <tr>
                    <th>Branch</th>
                    <td>Computer Engineering</td>
                  </tr>
                </table>
                <br>


                <table>
                  <tr>
                    <th> Total Obtainable Marks</th>
                    <td>
                    <input type="text" name="total_marks">
                    </td>
                  </tr>
                </table>
                <br>


                <table>
                  <tr class="bold-row">
                    <th>Roll No.</th>
                    <th>Student Name</th>
                    <th>Unit Test Marks</th>
                  </tr>
                  <?php
                  // Iterate over the fetched rows and populate the table dynamically
                  while ($row = $stmt_fetch_students->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . $row['roll_number'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>";
                    echo "<input name='marks[" . $row['roll_number'] . "]' type='text'>";
                    echo "</td>";
                    echo "</tr>";
                  }
                  ?>
                </table>
                <br>
              </body>
              <button type="submit">Submit</button>
            </form>
          </div>
</body>

<style>
  /* CSS styles for the form */
  .form-container {
    padding: 20px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin: 20px auto;