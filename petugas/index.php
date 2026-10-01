<!DOCTYPE html>
<html lang="en">

<!-- Head -->
 <?php include 'partials/head.php' ?>
<!-- head -->

<body>
  <div id="overlay" class="overlay"></div>
  <!-- TOPBAR -->
  <?php include 'components/topbar.php' ?>
  <!-- TOPBAR -->

  <!-- SIDEBAR -->
  <?php include 'components/sidebar.php' ?>
  <!-- SIDEBAR -->

  <!-- MAIN CONTENT -->
  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : "dashboard";
   switch ($page) {
    case 'dashboard':
        include 'pages/dashboard.php';
        break;
    case 'kendaraan':
        include 'pages/kendaraan/kendaraan.php';
        break;
    case 'tambah-kendaraan':
        include 'pages/kendaraan/tambah.php';
        break;
    case 'pembayaran':
        include 'pages/pembayaran/pembayaran.php';
        break;
    case 'tambah-pembayaran':
        include 'pages/pembayaran/tambah.php';
        break;
   }
   ?>

  <!-- Bootstrap JS -->
  <?php include 'partials/script.php' ?>


</body>

</html>