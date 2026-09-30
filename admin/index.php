<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php include 'partials/head.php' ?>
<!-- Head -->

<body>
    <!-- <div id="overlay" class="overlay"></div> -->
    <!-- TOPBAR -->
    <?php include 'components/topbar.php' ?>
    <!-- TOPBAR -->

    <!-- SIDEBAR -->
    <?php include 'components/sidebar.php' ?>
    <!-- SIDEBAR -->

    <!-- MAIN CONTENT -->
    <!-- Fungsinya untuk menampilkan halaman hanya dibagian main content saja -->
    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : "dashboard";
    switch ($page) {
        // Untuk memberi nama halamannya
        // Dashboard
        case 'dashboard':
            // isinya apa / mau diisi dengan bagian pages apa
            include 'pages/dashboard.php';
            // Fungsinya untuk menahan halaman agar tidak 
            // otomatis berpindah ke halaman setelahnya
            break;
        // Kategori -> untuk halaman kategori
        // case nya nanti berfungsi untuk manggil 
        // halaman di sidebar / hrefnya
        case 'kategori':
            include 'pages/kategori/kategori.php';
            break;
        case 'tambah-kategori':
            include 'pages/kategori/tambah.php';
            break;
        case 'kendaraan':
            include 'pages/kendaraan/kendaraan.php';
            break;
        case 'tambah-kendaraan':
            include 'pages/kendaraan/tambah.php';
            break;
        case 'penyewaan':
            include 'pages/penyewaan/penyewaan.php';
            break;
        case 'tambah-penyewaan':
            include 'pages/penyewaan/tambah.php';
            break;
        case 'peminjam':
            include 'pages/peminjam/peminjam.php';
        break;
        case 'pembayaran':
            include 'pages/pembayaran/pembayaran.php';
        break;
        case 'tambah-pembayaran':
            include 'pages/pembayaran/tambah.php';
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