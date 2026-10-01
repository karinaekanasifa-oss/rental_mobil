<!-- Bagian utama kerangka halaman dengan jarak padding atas dan bawah -->
<main id="content" class="content py-10">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <!-- Bagian Header Judul Halaman dan Tombol Navigasi ke Daftar Penyewaan -->
                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                      <div class="">
                          <!-- Judul utama halaman -->
                          <h1 class="fs-3 mb-1">Add Penyewaan</h1>
                          <!-- Keterangan singkat di bawah judul -->
                          <p class="mb-0">Manage your rental transactions</p>
                      </div>
                      <div>
                          <!-- Tombol untuk kembali ke halaman daftar penyewaan -->
                          <a href="index.php?page=penyewaan" class="btn btn-primary">Go to Rental List</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <!-- Kotak kartu (card) pembungkus form input data sewa -->
                  <div class="card">
                      <div class="card-body p-4">
                          <?php

                            // Memasukkan file fungsi penyewaan.php yang berisi class Penyewaan
                            require_once 'function/penyewaan.php';
                            
                            // Mengecek apakah tombol/aksi dengan name 'penyewaan' sudah dikirim atau belum
                            if (isset($_POST['penyewaan'])) {
                                // Membuat objek baru dari class Penyewaan
                                $penyewaan = new Penyewaan();

                                // Mengambil data inputan yang dikirim dari form
                                $var_id_user = $_POST['id_user'];
                                $var_id_kendaraan = $_POST['id_kendaraan'];
                                $var_tanggal_mulai = $_POST['tanggal_mulai'];
                                $var_tanggal_selesai = $_POST['tanggal_selesai'];
                                
                                // Memanggil method 'tambah' untuk menyimpan data penyewaan ke database
                                $result = $penyewaan->tambah(
                                    $var_id_user,
                                    $var_id_kendaraan,
                                    $var_tanggal_mulai,
                                    $var_tanggal_selesai
                                );

                                // Jika proses penyimpanan data ke database berhasil (true)
                                if ($result) {
                                    // Arahkan kembali halaman ke daftar penyewaan menggunakan script JavaScript
                                    echo "<script>window.location.href='index.php?page=penyewaan'</script>";
                                } else {
                                    // Jika gagal, tampilkan pesan error sederhana
                                    echo "Data penyewaan gagal ditambahkan.";
                                }
                            }
                            ?>
                          <!-- Form HTML untuk mengirim data penyewaan dengan metode POST -->
                          <form method="post" action="" id="addProductForm">
                              <!-- Input tersembunyi (hidden) untuk ID (biasanya dipakai untuk proses edit data) -->
                              <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter product name" required>
                              
                              <!-- Input untuk ID User / Peminjam -->
                              <div class="col-md-12 mb-3">
                                  <label for="id_user" class="form-label">ID User</label>
                                  <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Enter product name" required>
                              </div>
                              
                              <!-- Input untuk ID Kendaraan yang disewa -->
                              <div class="col-md-12 mb-3">
                                  <label for="id_kendaraan" class="form-label">ID Kendaraan</label>
                                  <input type="text" class="form-control" name="id_kendaraan" id="id_kendaraan" placeholder="Enter product name" required>
                              </div>
                              
                              <!-- Input untuk Tanggal Mulai sewa (tipe data kalender / date) -->
                              <div class="col-md-12 mb-3">
                                  <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                  <input type="date" class="form-control" name="tanggal_mulai" id="tanggal_mulai" placeholder="Enter product name" required>
                              </div>
                              
                              <!-- Input untuk Tanggal Selesai sewa (tipe data kalender / date) -->
                              <div class="col-md-12 mb-3">
                                  <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                  <input type="date" class="form-control" name="tanggal_selesai" id="tanggal_selesai" placeholder="Enter product name" required>
                              </div>
                              
                              <!-- Tombol untuk melakukan submit/kirim form -->
                              <div class="d-flex gap-2">
                                  <button type="submit" class="btn btn-primary">Add Product</button>
                              </div>

                          </form>
                      </div>
                  </div>


              </div>

          </div>

          <div class="row">
              <div class="col-12">
                  <!-- Bagian Footer halaman web -->
                  <footer class="text-center py-2 mt-6 text-secondary ">
                      <p class="mb-0">Copyright © 2026 InApp Inventory Dashboard. Developed by <a href="https://codescandy.com/" target="_blank" class="text-primary">CodesCandy</a> • Distributed by <a href="https://themewagon.com/" target="_blank" class="text-primary">ThemeWagon</a> </p>
                  </footer>
              </div>

          </div>

      </div>
  </main>