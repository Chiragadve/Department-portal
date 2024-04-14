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