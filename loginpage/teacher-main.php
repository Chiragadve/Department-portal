<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8" />
  <title>Admin Panel</title>
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
        <a href="#dashboard" class="active">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="add-attandance.php">
          <i class="bx bx-box"></i>
          <span class="links_name">Add Attandance</span>
        </a>
      </li>
      <li>
        <a href="add-mse.php">
          <i class="bx bx-box"></i>
          <span class="links_name">Add MSE Marks</span>
        </a>
      </li>
      <li>
        <a href="add-ese.php">
          <i class="bx bx-box"></i>
          <span class="links_name">Add ESE Marks</span>
        </a>
      </li>
      <li class="log_out">
        <a href="../index.html">
          <i class="bx bx-log-out"></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </div>

    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard">Dashboard</span>
        </div>
        <div class="search-box">
          <input type="text" placeholder="Search..." />
          <i class="bx bx-search"></i>
        </div>
      </nav>


      <div class="admin-title">Total students</div>
      <div class="home-content">
        <div class="overview-boxes">
          <div class="box">
            <div class="right-side">
              <div class="box-topic">Hey Teacher Welcome!</div>
              <div class="number">-</div>
              <div class="indicator">
              </div>
            </div>
          </div>
    </section>

    <script>
      let sidebar = document.querySelector(".sidebar");
      let sidebarBtn = document.querySelector(".sidebarBtn");
      sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
          sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
      };
    </script>

    <style>
      /* Googlefont Poppins CDN Link */
      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
      }

      .sidebar {
        position: fixed;
        height: 100%;
        width: 240px;
        background: #0A2558;
        transition: all 0.5s ease;
      }

      .sidebar.active {
        width: 60px;
      }

      .sidebar .logo-details {
        height: 80px;
        display: flex;
        align-items: center;
      }

      .sidebar .logo-details i {
        font-size: 28px;
        font-weight: 500;
        color: #fff;
        min-width: 60px;
        text-align: center
      }

      .sidebar .logo-details .logo_name {
        color: #fff;
        font-size: 24px;
        font-weight: 500;
      }

      .sidebar .nav-links {
        margin-top: 10px;
      }

      .sidebar .nav-links li {
        position: relative;
        list-style: none;
        height: 50px;
      }

      .sidebar .nav-links li a {
        height: 100%;
        width: 100%;
        display: flex;
        align-items: center;
        text-decoration: none;
        transition: all 0.4s ease;
      }

      .sidebar .nav-links li a.active {
        background: #081D45;
      }

      .sidebar .nav-links li a:hover {
        background: #081D45;
      }

      .sidebar .nav-links li i {
        min-width: 60px;
        text-align: center;
        font-size: 18px;
        color: #fff;
      }

      .sidebar .nav-links li a .links_name {
        color: #fff;
        font-size: 15px;
        font-weight: 400;
        white-space: nowrap;
      }

      .sidebar .nav-links .log_out {
        position: absolute;
        bottom: 0;
        width: 100%;
      }

      .home-section {
        position: relative;
        background: #f5f5f5;
        min-height: 100vh;
        width: calc(100% - 240px);
        left: 240px;
        transition: all 0.5s ease;
      }

      .sidebar.active~.home-section {
        width: calc(100% - 60px);
        left: 60px;
      }

      .home-section nav {
        display: flex;
        justify-content: space-between;
        height: 80px;
        background: #fff;
        display: flex;
        align-items: center;
        position: fixed;
        width: calc(100% - 240px);
        left: 240px;
        z-index: 100;
        padding: 0 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        transition: all 0.5s ease;
      }

      .sidebar.active~.home-section nav {
        left: 60px;
        width: calc(100% - 60px);
      }

      .home-section nav .sidebar-button {
        display: flex;
        align-items: center;
        font-size: 24px;
        font-weight: 500;
      }

      nav .sidebar-button i {
        font-size: 35px;
        margin-right: 10px;
      }

      .home-section nav .search-box {
        position: relative;
        height: 50px;
        max-width: 550px;
        width: 100%;
        margin: 0 20px;
      }

      nav .search-box input {
        height: 100%;
        width: 100%;
        outline: none;
        background: #F5F6FA;
        border: 2px solid #EFEEF1;
        border-radius: 6px;
        font-size: 18px;
        padding: 0 15px;
      }

      nav .search-box .bx-search {
        position: absolute;
        height: 40px;
        width: 40px;
        background: #2697FF;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        border-radius: 4px;
        line-height: 40px;
        text-align: center;
        color: #fff;
        font-size: 22px;
        transition: all 0.4 ease;
      }

      .home-section nav .profile-details {
        display: flex;
        align-items: center;
        background: #F5F6FA;
        border: 2px solid #EFEEF1;
        border-radius: 6px;
        height: 50px;
        min-width: 190px;
        padding: 0 15px 0 2px;
      }

      nav .profile-details img {
        height: 40px;
        width: 40px;
        border-radius: 6px;
        object-fit: cover;
      }

      nav .profile-details .admin_name {
        font-size: 15px;
        font-weight: 500;
        color: #333;
        margin: 0 10px;
        white-space: nowrap;
      }

      nav .profile-details i {
        font-size: 25px;
        color: #333;
      }

      .home-content {
        position: relative;
        padding-top: 104px;
      }

      .home-content .overview-boxes {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        padding: 0 20px;
        margin-bottom: 26px;
      }

      .overview-boxes .box {
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(100% / 4 - 15px);
        background: #fff;
        padding: 15px 14px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
      }

      .overview-boxes .box-topic {
        font-size: 20px;
        font-weight: 500;
      }

      .home-content .box .number {
        display: inline-block;
        font-size: 35px;
        margin-top: -6px;
        font-weight: 500;
      }

      .home-content .total-order {
        font-size: 20px;
        font-weight: 500;
      }
    </style>
</body>

</html>