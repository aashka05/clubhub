<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ClubHub</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: ClubHub
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
        /* Navbar Placeholder */
        /* Navbar */
        /* Navbar */
        /* Navbar */

        .navbar {
    width: 100%;
    height: 60px;
    background-color: #333;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
}

/* Grid Container */
.container {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* 4 columns in each row */
    gap: 1px; /* 1px gap between items */
    justify-content: center;
    align-items: center;
    max-width: 65%;
    margin: auto;
    padding: 20px;
    margin-top: 10px; /* Ensures it stays below navbar */
    margin-right: 80px; /* Shift layout slightly for the navbar */
    margin-bottom: 70px; /* Shift layout slightly for the navbar */
    grid-auto-rows: auto; /* Ensures rows expand based on content */
}

/* Club Section */
.club {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    margin-bottom: 20px;
}

/* Club Titles */
.club-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

/* Icons */
/* Icon Container */
/* Icon Container */
/* Icon Container */
.icon {
    width: 200px;
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    /* border: 1px solid black; */
    overflow: hidden;
    position: relative;
}

/* Club Logo */
.icon img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

/* Flaps (semi-transparent) */
.flap-top-right,
.flap-bottom-left {
    position: absolute;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4); /* Semi-transparent */
    transform: scaleY(0);
    transition: transform 0.4s ease-in-out;
}

/* Top-right flap drops down */
.flap-top-right {
    top: 0;
    right: 0;
    transform-origin: top;
}

/* Bottom-left flap rises up */
.flap-bottom-left {
    bottom: 0;
    left: 0;
    transform-origin: bottom;
}

/* Arrow Icon */
.icon-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    color: white;
    font-size: 30px;
    text-decoration: none;
    opacity: 0;
    transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
}

/* Hover Effects */
.icon:hover .flap-top-right,
.icon:hover .flap-bottom-left {
    transform: scaleY(1);
}

.icon:hover .icon-overlay {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
}



/* Background Images */
.icon1 { background-image: url("your-image-path1.png"); }
.icon2 { background-image: url("your-image-path2.png"); }
.icon3 { background-image: url("your-image-path3.png"); }
.icon4 { background-image: url("your-image-path4.png"); }

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        grid-template-columns: repeat(2, 1fr); /* Two columns for smaller screens */
    }
}

@media (max-width: 480px) {
    .container {
        grid-template-columns: repeat(1, 1fr); /* One column for very small screens */
    }
}


</style>
</head>




<body>
  
  <!-- ======= Header ======= -->
  <?php include_once('includes/header.php')?>

  <!-- ======= Sidebar ======= -->
  <?php include_once('includes/sidebar.php')?>
  
  <main id="main" class="main">
    
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
  </main><!-- End #main -->
  
  <div class="container">
    <?php
    include('includes/connection.php');
    
    // Fetch all clubs from the database
    $query = "SELECT club_id, club_name, club_logo FROM club ORDER BY club_name";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
          <div class="club">
            <div class="club-title"><?php echo htmlspecialchars($row['club_name']); ?></div>
            <div class="icon">
                <img src="<?php echo htmlspecialchars($row['club_logo']); ?>" alt="<?php echo htmlspecialchars($row['club_name']); ?> Logo">
                <div class="flap-top-right"></div>
                <div class="flap-bottom-left"></div>
                <a href="club.php?id=<?php echo $row['club_id']; ?>" class="icon-overlay">
                    <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

            <?php
        }
    } else {
        echo "<p>No clubs found.</p>";
    }
    ?>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>ClubHub</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Developed by <a href="https://bvmengineering.ac.in/" target="_blank">Vihaa & Aashka</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>