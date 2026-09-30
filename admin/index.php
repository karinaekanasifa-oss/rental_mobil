<!DOCTYPE html>
<html lang="en">

<!-- Head Section -->
<?php include 'partials/head.php' ?>
<!-- Head Section -->

<body>
  <div id="overlay" class="overlay"></div>
  <!-- TOPBAR -->
  <?php include 'components/topbar.php' ?>
  <!-- TOPBAR -->

  <!-- SIDEBAR -->
  <?php include 'components/sidebar.php' ?>
  <!-- SIDEBAR -->

  <!-- MAIN CONTENT -->
  <!-- fungsinya utk menampilkan halaman hnya di bagian main content saja -->
  <?php
  // semisal gaada array page, maka defaultnya akan menampilkan dashboard
  $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
  switch ($page) {
    // Untuk memberi nama halamannya
    // Dashboard
    case 'dashboard':
      // isinya apa / mau diisi dengan bagian pages apa
      include 'pages/dashboard.php';
      // Fungsinya untuk menahan halaman agar tidak 
      // otomatis berpindah ke halaman setelahnya
      break;
    // kategori -> utk halaman kategori
    // case nya berfungsi utk memanggil hlmn di sidebar / hrefnya
    case 'kategori':
      include 'pages/kategori/kategori.php';
      break;
    case 'tambah-kategori':
      include 'pages/kategori/tambah.php';
      break;
    // untuk mengarahkan halaman awal yang akan dibuka
    default:
      include 'pages/dashboard.php';
      break;
  }
  ?>
  <!-- MAIN CONTENT -->

  <!-- Bootstrap JS -->
  <?php include 'partials/script.php' ?>
  <!-- Bootstrap JS -->


</body>

</html>