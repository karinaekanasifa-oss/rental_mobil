<!-- Bagian utama konten halaman dengan margin atas dan bawah (padding) -->
<main id="content" class="content py-10">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <!-- Bagian Header Judul Halaman dan Tombol Navigasi Kembali -->
                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                      <div class="">
                          <!-- Judul halaman -->
                          <h1 class="fs-3 mb-1">Add Kendaraan</h1>
                          <!-- Keterangan singkat di bawah judul -->
                          <p class="mb-0">Manage your penyewaan kendaraan</p>
                      </div>
                      <div>
                          <!-- Tombol untuk kembali ke halaman daftar kendaraan -->
                          <a href="index.php?page=kendaraan" class="btn btn-primary">Go to Kendaraan List</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <!-- Kotak kartu (card) untuk membungkus form input -->
                  <div class="card">
                      <div class="card-body p-4">
                          <?php

                            // Memasukkan file fungsi kendaraan.php yang berisi class Kendaraan
                            require_once 'function/kendaraan.php';
                            
                            // Mengecek apakah tombol submit dengan name 'kendaraan' sudah ditekan atau belum
                            if (isset($_POST['kendaraan'])) {
                                // Membuat objek baru dari class Kendaraan
                                $kendaraan = new Kendaraan();

                                // Mengambil data yang dikirim dari form inputan pengguna
                                $var_id_kategori = $_POST['kategori'];
                                $var_nama_kendaraan = $_POST['nama_kendaraan'];
                                $var_harga_sewa = $_POST['harga_sewa'];
                                $var_status = $_POST['status'];
                                
                                // Memanggil method 'tambah' dari class Kendaraan untuk menyimpan data ke database
                                $result = $kendaraan->tambah(
                                    $var_id_kategori,
                                    $var_nama_kendaraan,
                                    $var_harga_sewa,
                                    $var_status
                                );

                                // Jika proses simpan ke database berhasil (true)
                                if ($result) {
                                    // Alihkan halaman kembali ke daftar kendaraan menggunakan JavaScript
                                    echo "<script>window.location.href='index.php?page=kendaraan'</script>";
                                } else {
                                    // Jika gagal, tampilkan pesan error sederhana
                                    echo "Data kendaraan gagal ditambahkan.";
                                }
                            }
                            ?>
                          <!-- Form HTML untuk mengirim data inputan kendaraan dengan metode POST -->
                          <form method="post" action="" id="addProductForm">
                              <!-- Input tersembunyi (hidden) untuk ID (biasanya dipakai saat edit data) -->
                              <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter product name" required>
                              
                              <!-- Input untuk Kategori Kendaraan -->
                              <div class="col-md-12 mb-3">
                                  <label for="kategori" class="form-label">Nama Kategori</label>
                                  <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Enter product name" required>
                              </div>
                              
                              <!-- Input untuk Nama Kendaraan -->
                              <div class="col-md-12 mb-3">
                                  <label for="nama_kendaraan" class="form-label">Nama Kendaraan</label>
                                  <input type="text" class="form-control" name="nama_kendaraan" id="nama_kendaraan" placeholder="Enter product name" required>
                              </div>
                              
                              <!-- Input untuk Harga Sewa (tipe data angka / number) -->
                              <div class="col-md-12 mb-3">
                                  <label for="harga_sewa" class="form-label">Harga Sewa</label>
                                  <input type="number" class="form-control" name="harga_sewa" id="harga_sewa" placeholder="Enter product name" required>
                              </div>
                              
                              <!-- Pilihan Status Kendaraan (Dropdown / Select) -->
                              <div class="col-md-12 mb-3">
                                  <label for="status" class="form-label">Status</label>
                                  <select class="form-control" name="status" id="status" required>
                                      <option value="">Select Status</option>
                                      <option value="tersedia">Disewa</option>
                                      <option value="tersedia">Perbaikan</option>
                                      <option value="tidak_tersedia">Ready</option>
                                  </select>
                              </div>
                              
                              <!-- Tombol Submit untuk mengirim data form -->
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
                  <!-- Bagian Footer halaman -->
                  <footer class="text-center py-2 mt-6 text-secondary ">
                      <p class="mb-0">Copyright © 2026 InApp Inventory Dashboard. Developed by <a href="https://codescandy.com/" target="_blank" class="text-primary">CodesCandy</a> • Distributed by <a href="https://themewagon.com/" target="_blank" class="text-primary">ThemeWagon</a> </p>
                  </footer>
              </div>

          </div>

      </div>
  </main>