<!-- Bagian utama konten halaman dengan jarak atas dan bawah (padding) -->
<main id="content" class="content py-10">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <!-- Bagian Header Judul Halaman dan Tombol Navigasi ke Daftar Pembayaran -->
                  <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
                      <div class="">
                          <!-- Judul utama halaman -->
                          <h1 class="fs-3 mb-1">Add Pembayaran</h1>
                          <!-- Keterangan singkat di bawah judul -->
                          <p class="mb-0">Manage your payment records</p>
                      </div>
                      <div>
                          <!-- Tombol untuk kembali ke halaman daftar pembayaran -->
                          <a href="index.php?page=pembayaran" class="btn btn-primary">Go to Payment List</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <!-- Kartu (card) pembungkus form input pembayaran -->
                  <div class="card">
                      <div class="card-body p-4">
                          <?php

                            // Memasukkan file fungsi pembayaran.php yang berisi class Pembayaran
                            require_once 'function/pembayaran.php';
                            
                            // Mengecek apakah tombol submit dengan name 'pembayaran' sudah ditekan atau belum
                            if (isset($_POST['pembayaran'])) {
                                // Membuat objek baru dari class Pembayaran
                                $pembayaran = new Pembayaran();

                                // Mengambil data inputan yang dikirimkan dari form
                                $var_id_penyewaan = $_POST['id_penyewaan'];
                                $var_total_bayar = $_POST['total_bayar'];
                                $var_status = $_POST['status'];
                                
                                // Memanggil method 'tambah' untuk memasukkan data pembayaran ke database
                                $result = $pembayaran->tambah(
                                    $var_id_penyewaan,
                                    $var_total_bayar,
                                    $var_status
                                );

                                // Jika proses penyimpanan data berhasil (true)
                                if ($result) {
                                    // Arahkan kembali halaman ke daftar pembayaran menggunakan script JavaScript
                                    echo "<script>window.location.href='index.php?page=pembayaran'</script>";
                                } else {
                                    // Jika gagal, tampilkan pesan error sederhana
                                    echo "Data pembayaran gagal ditambahkan.";
                                }
                            }
                            ?>
                          <!-- Form HTML untuk mengirim data pembayaran menggunakan metode POST -->
                          <form method="post" action="" id="addProductForm">
                              <!-- Input tersembunyi (hidden) untuk ID (biasanya dipakai saat fitur edit data) -->
                              <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter product name" required>
                              
                              <!-- Input untuk ID Penyewaan -->
                              <div class="col-md-12 mb-3">
                                  <label for="id_penyewaan" class="form-label">ID Penyewaan</label>
                                  <input type="text" class="form-control" name="id_penyewaan" id="id_penyewaan" placeholder="Enter payment ID" required>
                              </div>
                              
                              <!-- Input untuk Total Bayar (tipe angka / number) -->
                              <div class="col-md-12 mb-3">
                                  <label for="total_bayar" class="form-label">Total Bayar</label>
                                  <input type="number" class="form-control" name="total_bayar" id="total_bayar" placeholder="Enter total payment" required>
                              </div>
                              
                              <!-- Pilihan Status Pembayaran (Dropdown / Select) -->
                              <div class="col-md-12 mb-3">
                                  <label for="status" class="form-label">Status</label>
                                  <select class="form-control" name="status" id="status" required>
                                      <option value="">Select Status</option>
                                      <option value="lunas">Lunas</option>
                                      <option value="perbaikan">Belum Lunas</option>
                                  </select>
                              </div>
                              
                              <!-- Tombol untuk mengirim/submit form -->
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